<?php
require_once 'vendor/autoload.php';

session_start();

$client = new Google_Client();
$client->setClientId(getenv('GOOGLE_CLIENT_ID')); // Use environment variable
$client->setClientSecret(getenv('GOOGLE_CLIENT_SECRET')); // Use environment variable
$client->setRedirectUri(getenv('REDIRECT_URI')); // Use environment variable or set this manually for production
$client->addScope('email');
$client->addScope('profile');

// Generate and set a random state parameter to prevent CSRF attacks
$state = bin2hex(random_bytes(16));
$_SESSION['state'] = $state;
$client->setState($state);

$login_url = $client->createAuthUrl();

// Redirect the user to Google's OAuth 2.0 server
header("Location: $login_url");
exit();
?>
