<?php
session_start();

$client_id = 'Ov23liGy4bofQUYK4xjf';
$redirect_uri = 'http://localhost/Loginacc/github_callback.php';
$state = bin2hex(random_bytes(8)); // Generate a random state parameter

$_SESSION['state'] = $state;

$auth_url = "https://github.com/login/oauth/authorize?client_id=$client_id&redirect_uri=$redirect_uri&state=$state";

header("Location: $auth_url");
exit();
?>
