<?php
session_start();

// Destroy all session data
session_unset();
session_destroy();

// Redirect to login page or homepage
header("Location: login.html"); // Change to your desired page
exit();
?>
