<?php

require 'vendor/autoload.php';

$secretKey = 'FLWSECK_TEST-8dcc49f80b7c2a91487a62cf50484afb-X';

$transactionID = $_GET['transaction_id'];

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/$transactionID/verify",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        "Authorization: Bearer $secretKey"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
    echo "CURL Error: " . $err;
} else {
    $response_data = json_decode($response, true);
    if ($response_data['status'] === 'success') {
        echo "Payment was successful!";
    } else {
        echo "Payment verification failed!";
    }
}


?>