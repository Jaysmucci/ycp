<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['checked'])) {

    // Check if CSRF token from form matches token stored in session
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        // CSRF token is invalid
        die("Invalid CSRF token");
		echo "Session CSRF Token: " . $_SESSION['csrf_token'] . "<br>";
		echo "Submitted CSRF Token: " . $_POST['csrf_token'] . "<br>";

    }

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $course = htmlspecialchars($_POST['course']);
    $amount = htmlspecialchars($_POST['amount']);
    $gateway = htmlspecialchars($_POST['gateway']);
	
	
	// store user details in session
	$_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['course'] = $course;
    $_SESSION['amount'] = $amount;

    // Regenerate a new CSRF token to prevent reuse
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));


    if ($gateway === 'flutterwave') {
        $endpoint = "https://api.flutterwave.com/v3/payments";
        $bearerToken = 'FLWSECK_TEST-8dcc49f80b7c2a91487a62cf50484afb-X';
    
        $headers = [
            'Authorization: Bearer ' . $bearerToken,
            'Content-Type: application/json',
        ];
    
        // Set the payload
        $data = [
            'tx_ref' => uniqid(),
            'amount' => $amount,
            'currency' => 'NGN',
            'customer' => [
                'email'=> $email,
                'name' => $name,
            ],
            'redirect_url' => 'http://localhost/ycp/success',
            'meta' => [
                'course' => $course  // Course selected
            ]
        ];
    
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => $headers
        ));
    
        // Execute the curl
        $responseData = curl_exec($ch);
    
        // Check for cURL errors
        if (curl_errno($ch)) {
            //echo 'cURL error: ' . curl_error($ch);
			header("Location: payment.php");
        } else {
            $result = json_decode($responseData, true);
    
            // Check if the response is successful
            if (isset($result['status']) && $result['status'] === 'success') {
                // Redirect the user to the payment link
                header("Location: " . $result['data']['link']);
                exit;
            } else {
                echo 'Error: ' . $result['message'];
            }
        }
    
        curl_close($ch);

    }elseif ($gateway === 'paystack') {
        $endpoint = "https://api.paystack.co/transaction/initialize";
        $bearerToken = 'sk_test_a4cd8f3349e44bb921f63fcd883107c465c65f21'; // Replace with your actual secret key

        $headers = [
            'Authorization: Bearer ' . $bearerToken,
            'Content-Type: application/json',
        ];

        // Ensure $email and $name are set and not empty
        if (empty($email) || empty($name)) {
            //echo 'Error: Email Address and Name are required';
            exit;
        }

        // Set the payload
        $data = [
            'tx_ref' => uniqid(),
            'amount' => $amount * 100,
            'currency' => 'NGN',
            'email' => $email,
            'name' => $name,
            'callback_url' => 'http://localhost/ycp/success.php',
            'meta' => [
                'course' => $course  // Course selected
            ]
        ];

        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => $headers
        ));

        // Execute the curl
        $responseData = curl_exec($ch);

        // Check for cURL errors
        if (curl_errno($ch)) {
            echo 'cURL error: ' . curl_error($ch);
        } else {
            $result = json_decode($responseData, true);

            // Check if the response is successful
            if (isset($result['status']) && $result['status'] === true) {
                if (isset($result['data']['authorization_url'])) {
                    // Redirect the user to the payment link
                    header("Location: " . $result['data']['authorization_url']);
                    exit;
                } else {
                    echo 'Error: Authorization URL not found in the response.';
                }
            } else {
                echo 'Error: ' . $result['message'];
            }
        }

        curl_close($ch);

        // Handle after successful payment (using success URL)
        // Note: This section will only run after redirection and should be in the success.php file

    }else{
        echo "no payment method selected!";
    }

    // set connection variables
 

   
}
?>