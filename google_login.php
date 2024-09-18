<?php
require_once 'vendor/autoload.php';

session_start();

$client = new Google_Client();
$client->setClientId('631821749808-3t05lboh8g4i7gbvn6tkq255g3o0po3l.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/E-learning/google_callback.php');
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