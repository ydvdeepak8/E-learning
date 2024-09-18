<?php
session_start();
require_once 'vendor/autoload.php';

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tesst";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from AJAX request
$title = $conn->real_escape_string($_POST['title']);
$isInWishlist = $conn->real_escape_string($_POST['in_wishlist']);

// Assume user ID is stored in session
$userId = $_SESSION['user_id'];

// Insert or update wishlist status
$sql = "INSERT INTO user_wishlist (user_id, course_title, in_wishlist) 
        VALUES ('$userId', '$title', '$isInWishlist') 
        ON DUPLICATE KEY UPDATE in_wishlist = '$isInWishlist'";

if ($conn->query($sql) === TRUE) {
    echo "Wishlist updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
