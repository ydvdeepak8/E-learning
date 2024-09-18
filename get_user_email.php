<?php
session_start(); // Make sure this is at the top of every page
// Check if session contains 'email'
if (!isset($_SESSION['email'])) {
    echo json_encode(['error' => 'User not logged in']);
} else {
    echo json_encode(['name' => $_SESSION['name']]);
}
?>
