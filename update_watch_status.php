<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tesst";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the video ID from the AJAX request
$videoId = isset($_POST['video_id']) ? intval($_POST['video_id']) : 0;

if ($videoId) {
    // SQL to mark video as watched (add to a user-specific table if needed)
    $sql = "UPDATE course_videos SET watched = 1 WHERE id = $videoId";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => $conn->error]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid video ID']);
}

$conn->close();
?>
