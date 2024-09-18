<?php
// Start session
session_start();

// Check if the user is logged in and get the user's name from the session
$userName = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Guest';

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

// Get course details
$courseTitle = isset($_GET['course']) ? urldecode($conn->real_escape_string(trim($_GET['course']))) : '';

// Debugging: Print the course title to verify
echo "Course Title: " . htmlspecialchars($courseTitle) . "<br>";

$sqlCourse = "SELECT * FROM courses WHERE title COLLATE utf8mb4_general_ci LIKE '%$courseTitle%'";
$resultCourse = $conn->query($sqlCourse);

$course = null;
if ($resultCourse && $resultCourse->num_rows > 0) {
    $course = $resultCourse->fetch_assoc();
    $courseId = $course['id'];

    // Fetch videos for this course
    $sqlVideos = "SELECT * FROM course_videos WHERE course_id='$courseId'";
    $resultVideos = $conn->query($sqlVideos);

    // Fetch assignments for this course
    $sqlAssignments = "SELECT * FROM course_assignments WHERE course_id='$courseId'";
    $resultAssignments = $conn->query($sqlAssignments);

    if (!$resultVideos || !$resultAssignments) {
        die("Error retrieving data: " . $conn->error);
    }
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title><?php echo htmlspecialchars($course['title'] ?? 'Course Details'); ?></title>
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap">
    <style>
        /* Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom, #e3f2fd, #ffffff, #fce4ec);
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1000px;
            margin: 30px auto;
            padding: 20px;
            background: rgba(255, 255, 255, 1.5);
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1, h2 {
            font-family: 'Roboto', sans-serif;
            color: #03a9f4;
            transition: color 0.3s ease;
        }

        h1:hover, h2:hover {
            color: #388E3C;
        }

        p {
            font-size: 18px;
            line-height: 1.6;
            color: #555;
            margin-bottom: 20px;
        }

        .user-greeting {
            
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
            color:#2E3031;
        }

        .video-list {
            list-style-type: none;
            padding: 0;
        }

        .video-list li {
            margin: 20px 0;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 10px;
            background: #fff;
            position: relative;
        }

        .video-title {
            font-weight: 500;
            font-size: 20px;
            color: #333;
            padding: 10px;
            background: #f8f8f8;
            border-bottom: 2px solid #ddd;
            cursor: pointer;
            position: relative;
        }

        .video-title::after {
            content: '\2315';
            position: absolute;
            right: 10px;
            font-size: 24px;
            transition: transform 0.3s ease;
        }

        .video-title.expanded::after {
            transform: rotate(180deg);
        }

        .video-content {
            display: none;
            padding: 10px;
        }

        .video-content.active {
            display: block;
        }

        video, iframe {
            width: 100%;
            height: 400px;
            border-radius: 0 0 10px 10px;
        }

        .assignment, .quiz-card {
            margin: 20px auto;
            padding: 20px;
            max-width: 600px;
            border-radius: 10px;
            text-align: center;
            position: relative;
        }

        .quiz-card {
            background: #e3f2fd;
            border: 2px solid #039be5;
        }

        .btn {
            background-color: #039be5;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0288d1;
        }
        .quiz-card {
    margin-bottom: 20px; /* Add padding to differentiate between cards */
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.video-title {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
}

.btn {
    background: linear-gradient(to right, pink, red);
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
}

.btn:hover {
    background: linear-gradient(to right, red, pink); /* Hover effect */
}

    </style>
</head>
<body>

    <div class="container">
        <!-- Display user's name -->
        <div class="user-greeting">
            Start your learning, <?php echo htmlspecialchars($userName); ?>!
        </div>

        <h1><?php echo htmlspecialchars($course['title'] ?? ''); ?></h1>
        <p><?php echo htmlspecialchars($course['description'] ?? ''); ?></p>
        
        <h2>Course Videos</h2>
        <ul class="video-list">
            <?php 
            $videoCount = 0;
            if (isset($resultVideos) && $resultVideos->num_rows > 0) {
                while ($video = $resultVideos->fetch_assoc()) {
                    $videoCount++;
                    $videoUrl = htmlspecialchars($video['video_url']);
                    $youtubeId = '';

                    if (preg_match('/v=([a-zA-Z0-9_-]+)/', $videoUrl, $matches)) {
                        $youtubeId = $matches[1];
                    }

                    echo "<li data-video-id='{$video['id']}' class='video-item'>
                        <div class='video-title'>{$video['title']}</div>
                        <div class='video-content'>";

                    if ($youtubeId) {
                        echo "<iframe class='yt-video' src='https://www.youtube.com/embed/{$youtubeId}' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
                    } else {
                        echo "<video controls>
                            <source src='{$videoUrl}' type='video/mp4'>
                            Your browser does not support the video tag.
                        </video>";
                    }

                    echo "</div></li>";

                    // Show a quiz assignment after every 5 videos
                    if ($videoCount % 5 == 0 && isset($resultAssignments) && $resultAssignments->num_rows > 0) {
                        $assignment = $resultAssignments->fetch_assoc();
                        if ($assignment && $assignment['assignment_type'] == 'quiz') {
                            echo "<li class='quiz-card'>
                                    <div class='video-title'>Quiz Assignment</div>
                                    <div class='video-content'>
                                        <a href='quiz.php' class='btn'>Complete Quiz</a>
                                    </div>
                                </li>";
                        }
                    }
                }
            } else {
                echo "<p>No videos found for this course.</p>";
            }
            ?>
        </ul>

        <!-- Section to Display Watched Videos -->
        <li class='quiz-card'>
    <div class='video-title'>Final Assignment</div>
    <div class='video-content'>
        <a href="ASSES.html" class='btn'>
            Complete Final Assignment
        </a>
    </div>
</li>

  
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const watchedVideos = [];

            const titles = document.querySelectorAll('.video-title');
            titles.forEach(title => {
                title.addEventListener('click', function() {
                    const content = this.nextElementSibling;
                    if (content.classList.contains('active')) {
                        content.classList.remove('active');
                        this.classList.remove('expanded');
                    } else {
                        content.classList.add('active');
                        this.classList.add('expanded');
                    }

                    const videoElement = this.nextElementSibling.querySelector('iframe');
                    if (videoElement) {
                        const videoId = this.closest('.video-item').dataset.videoId;

                        if (!watchedVideos.includes(videoId)) {
                            watchedVideos.push(videoId);
                            updateWatchedVideosList(videoId);
                        }

                        const xhr = new XMLHttpRequest();
                        xhr.open('POST', 'update_watch_status.php', true);
                        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        xhr.onload = function() {
                            if (xhr.status === 200) {
                                const response = JSON.parse(xhr.responseText);
                                if (response.success) {
                                    console.log('Video marked as watched');
                                } else {
                                    console.log('Failed to mark video as watched');
                                }
                            }
                        };
                        xhr.send('video_id=' + videoId);
                    }
                });
            });

            function updateWatchedVideosList(videoId) {
                const videoListItem = document.createElement('li');
                videoListItem.textContent = 'Video ' + videoId + ' watched';
                document.getElementById('watched-videos-list').appendChild(videoListItem);
            }
        });
    </script>

</body>
</html>
