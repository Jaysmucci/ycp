<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$secretKeys = [
    'flutterwave' => 'FLWSECK_TEST-8dcc49f80b7c2a91487a62cf50484afb-X',
    'paystack' => 'sk_test_a4cd8f3349e44bb921f63fcd883107c465c65f21',
    // 'opay' => 'OPAYPRV17249442586970.8278605237073536'
];

// Determine the payment Gateway
$referenceID = $_GET['reference'] ?? null;
$transactionID = $_GET['transaction_id'] ?? null;



// Determine Payment Gateway Selected
if ($transactionID) {
    $endpoint = "https://api.flutterwave.com/v3/transactions/$transactionID/verify";
    $secretKey = $secretKeys['flutterwave'];
} elseif ($referenceID) {
    $endpoint = "https://api.paystack.co/transaction/verify/$referenceID";
    $secretKey = $secretKeys['paystack'];
} else {
    echo "Invalid Payment Gateway";
    exit;
}

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => $endpoint,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        "Authorization: Bearer $secretKey",
        "Content-Type: application/json"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
    echo "CURL Error: " . $err;
} else {
    $response_data = json_decode($response, true);
    if ($response_data['status'] === 'success' || 'true') {

        // Now send the email to the user
        $name = htmlspecialchars($_SESSION['name']);
        $email = htmlspecialchars($_SESSION['email']);
        $course = htmlspecialchars($_SESSION['course']);
        $amount = htmlspecialchars($_SESSION['amount']);

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'mail.ycprepacco.com.ng';
        $mail->SMTPAuth = true;
        $mail->Username = 'admin@ycprepacco.com.ng';
        $mail->Password = 'TKX%gR{LxJpF';  // Ycprepacco@2024
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Recipients
        $mail->setFrom('admin@ycprepacco.com.ng', 'Young Catholic Professionals');
        $mail->addAddress($email, $name);  // Send email to the user

        // Content
        $meetLink = 'https://meet.google.com/ubi-icgp-drm';  // Example Google Meet link
        $whatsappLink = 'https://chat.whatsapp.com/your-whatsapp-group-link';  // Example WhatsApp link

        $mail->isHTML(true);
        $mail->Subject = 'Your Purchase: ' . $course;

        // Email body with blue header and footer
        $mail->Body = "
            <div style='font-family: Arial, sans-serif;'>
                <div style='background-color: #007BFF; color: white; padding: 20px; text-align: center;'>
                    <h1>Thank you for your purchase, $name!</h1>
                </div>
                
                <div style='padding: 20px;'>
                    <p>You have successfully purchased the course: <strong>$course</strong></p>
                    <p>Amount Paid: <strong>NGN $amount</strong></p>
                    <p>Join the Google Meet session: <a href=\"$meetLink\">Click here to join the class online</a></p>
                    <p>Join the WhatsApp group: <a href=\"$whatsappLink\">Click here to join the WhatsApp group</a></p>
                    <p>If you have any questions, feel free to contact us.</p>
                </div>

                <div style='background-color: #007BFF; color: white; padding: 10px; text-align: center;'>
                    <p>Contact us at: <a style='color: white;' href='mailto:admin@ycprepacco.com.ng'>admin@ycprepacco.com.ng</a></p>
                    <p>&copy; 2024 Young Catholic Professionals. All Rights Reserved.</p>
                </div>
            </div>
        ";

        // Plain text alternative for non-HTML email clients
        $mail->AltBody = "Thank you for your purchase!\nYou have successfully purchased the course: $course\nAmount Paid: NGN $amount\nJoin the Google Meet session: $meetLink\nJoin the WhatsApp group: $whatsappLink\nIf you have any questions, feel free to contact us.";

        $mail->send();
        echo 'Email has been sent to ' . $email;
		session_destroy();
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    }else{
		echo "Payment verification failed!";
	}
}


?>