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

$userId = $_SESSION['user_id'];
$courseId = isset($_GET['course_id']) ? (int)$_GET['course_id'] : 0;

if (!$courseId) {
    echo "Invalid course ID.";
    exit;
}

$sqlTotalItems = "
    SELECT 
        (SELECT COUNT(*) FROM course_videos WHERE course_id='$courseId') AS total_videos,
        (SELECT COUNT(*) FROM course_assignments WHERE course_id='$courseId') AS total_assignments
";

$resultTotalItems = $conn->query($sqlTotalItems);
$totalItems = $resultTotalItems->fetch_assoc();

$totalVideos = (int)$totalItems['total_videos'];
$totalAssignments = (int)$totalItems['total_assignments'];
$totalRequired = $totalVideos + $totalAssignments;

$sqlUserProgress = "
    SELECT COUNT(*) AS completed_items 
    FROM user_progress 
    WHERE user_id='$userId' AND course_id='$courseId' AND completed=1
";

$resultProgress = $conn->query($sqlUserProgress);
$userProgress = $resultProgress->fetch_assoc();

$completedItems = (int)$userProgress['completed_items'];

if ($completedItems < $totalRequired) {
    echo "You need to complete all videos and assignments to unlock the certificate.";
    exit;
}

$certificateFile = 'certificates/sample-certificate.pdf';

header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="certificate.pdf"');
readfile($certificateFile);
exit;
?>
