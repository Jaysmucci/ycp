<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';  

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['checked'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $course = htmlspecialchars($_POST['course']);
    $amount = htmlspecialchars($_POST['amount']);

    // set connection variables
 

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
        'redirect_url' => 'http://localhost/ycp/success.php',
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
        if (isset($result['status']) && $result['status'] === 'success') {
            // Redirect the user to the payment link
            header("Location: " . $result['data']['link']);
            exit;
        } else {
            echo 'Error: ' . $result['message'];
        }
    }

    curl_close($ch);

    // After successful payment (you can use the success URL to handle this)
    if ($result['status'] === 'success') {
        // Send an email to the buyer
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  // For Gmail
            $mail->SMTPAuth = true;
            $mail->Username = 'your-email@gmail.com';  // Your Gmail address
            $mail->Password = 'your-email-password';  // Your Gmail password or App Password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('your-email@gmail.com', 'Your Name');
            $mail->addAddress($email, $name);  // Send email to buyer

            // Zoom and WhatsApp Group Links
            $meetLink = 'https://meet.google.com/ubi-icgp-drm';
            $whatsappLink = 'https://chat.whatsapp.com/your-whatsapp-group-link';

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Your Purchase: ' . $course;
            $mail->Body    = "
                <h2>Thank you for your purchase!</h2>
                <p>You have successfully purchased the course: <strong>$course</strong></p>
                <p>Amount Paid: NGN $amount</p>
                <p>Join the Google Meet session: <a href=\"$meetLink\">Click here to join the class Online</a></p>
                <p>Join the WhatsApp group: <a href=\"$whatsappLink\">Click here to join the WhatsApp group</a></p>
                <p>If you have any questions, feel free to contact us.</p>
            ";
            $mail->AltBody = "Thank you for your purchase!\nYou have successfully purchased the course: $course\nAmount Paid: NGN $amount\nJoin the Google Meet session: $meetLink\nJoin the WhatsApp group: $whatsappLink\nIf you have any questions, feel free to contact us.";

            $mail->send();
            echo 'Email has been sent';
        } catch (Exception $e) {
            echo 'Email could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}

?>
