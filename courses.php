<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "courses_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Get course details
$courseTitle = isset($_GET['course']) ? $conn->real_escape_string($_GET['course']) : '';

$sqlCourse = "SELECT * FROM courses WHERE title='$courseTitle'";
$resultCourse = $conn->query($sqlCourse);

if ($resultCourse->num_rows > 0) {
    $course = $resultCourse->fetch_assoc();
    $courseId = $course['id'];

    // Fetch videos for this course
    $sqlVideos = "SELECT * FROM course_videos WHERE course_id='$courseId'";
    $resultVideos = $conn->query($sqlVideos);

    // Fetch assignments for this course
    $sqlAssignments = "SELECT * FROM course_assignments WHERE course_id='$courseId'";
    $resultAssignments = $conn->query($sqlAssignments);
} else {
    echo "Course not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($course['title']); ?> - Course Details</title>
    <style>
        .container { max-width: 800px; margin: 0 auto; padding: 20px; }
        .video-list { list-style-type: none; padding: 0; }
        .video-list li { margin: 10px 0; }
        .assignment { margin-top: 30px; }
        .assignment a { color: blue; }
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo htmlspecialchars($course['title']); ?></h1>
        <p><?php echo htmlspecialchars($course['description']); ?></p>

        <h2>Course Videos</h2>
        <ul class="video-list">
            <?php 
            $videoCount = 0;
            while ($video = $resultVideos->fetch_assoc()) {
                $videoCount++;
                echo "<li>
                    <video width='100%' controls>
                        <source src='{$video['video_url']}' type='video/mp4'>
                        Your browser does not support the video tag.
                    </video>
                    <p>{$video['title']}</p>
                </li>";

                // Show a quiz assignment after every 5 videos
                if ($videoCount % 5 == 0 && $resultAssignments->num_rows > 0) {
                    $assignment = $resultAssignments->fetch_assoc();
                    if ($assignment['assignment_type'] == 'quiz') {
                        echo "<div class='assignment'>
                                <a href='{$assignment['assignment_url']}'>Complete Quiz</a>
                              </div>";
                    }
                }
            }
            ?>
        </ul>

        <?php if ($resultAssignments->num_rows > 0) {
            $finalAssignment = $resultAssignments->fetch_assoc();
            if ($finalAssignment['assignment_type'] == 'final') {
                echo "<div class='assignment'>
                        <h2>Final Assignment</h2>
                        <a href='{$finalAssignment['assignment_url']}'>Complete Final Assignment</a>
                      </div>";
            }
        } ?>
    </div>
</body>
</html>
