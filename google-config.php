<?php
require_once 'vendor/autoload.php';

session_start();

$client = new Google\Client();
$client->setClientId('YOUR_GOOGLE_CLIENT_ID');
$client->setClientSecret('YOUR_GOOGLE_CLIENT_SECRET');
$client->setRedirectUri('http://yourdomain.com/google-callback.php');
$client->addScope("email");
$client->addScope("profile");
?>