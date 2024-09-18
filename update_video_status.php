<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tesst";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['video_id']) && isset($_SESSION['username'])) {
    $videoId = $conn->real_escape_string($_POST['video_id']);
    $username = $conn->real_escape_string($_SESSION['username']);

    // Update the watched status in the database
    $sql = "UPDATE course_videos SET watched = 1 WHERE id = '$videoId'";
    if ($conn->query($sql) === TRUE) {
        echo "Success";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
