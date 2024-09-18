<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tesst";

$conn = new mysqli($servername, $username, $password, $dbname);

// Get course/video/assignment details from POST
$courseId = isset($_POST['course_id']) ? (int)$_POST['course_id'] : 0;
$videoId = isset($_POST['video_id']) ? (int)$_POST['video_id'] : 0;
$assignmentId = isset($_POST['assignment_id']) ? (int)$_POST['assignment_id'] : 0;

if (!$courseId) {
    http_response_code(400);
    echo "Invalid course.";
    exit;
}

// Assume user ID from session
$userId = 1;

// Track video completion
if ($videoId) {
    $sql = "INSERT INTO user_progress (user_id, course_id, video_id, completed)
            VALUES ('$userId', '$courseId', '$videoId', 1)
            ON DUPLICATE KEY UPDATE completed=1";
}

// Track assignment completion
if ($assignmentId) {
    $sql = "INSERT INTO user_progress (user_id, course_id, assignment_id, completed)
            VALUES ('$userId', '$courseId', '$assignmentId', 1)
            ON DUPLICATE KEY UPDATE completed=1";
}

if ($conn->query($sql) === TRUE) {
    echo "Progress updated.";
} else {
    http_response_code(500);
    echo "Error: " . $conn->error;
}

$conn->close();
?>
