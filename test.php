<?php
require 'vendor/autoload.php'; // Load Twilio SDK

use Twilio\Rest\Client;

$sid    = "AC8f34c56a63af91c200bd4ec38ea0a15c"; // Your Twilio Account SID
$token  = "d226c0fcdd339bba6dc90b9e889a2da2";  // Your Twilio Auth Token
$service_sid = "VAaebb0d51dd38db5856c6ae83df06352b"; // Twilio Verify Service SID

$twilio = new Client($sid, $token);

// User phone number (modify as needed)
$phone_number = "+916353054338";

try {
    $verification = $twilio->verify->v2->services($service_sid)
                                       ->verifications
                                       ->create($phone_number, "sms");

    echo "OTP Sent Successfully! Verification SID: " . $verification->sid;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
