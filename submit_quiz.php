<?php
session_start(); // Start the session

// Check if the username is stored in the session
if (!isset($_SESSION['name'])) {
    echo json_encode(['message' => 'Error: User not logged in']);
    exit();
}

// Database connection
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "tesst"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the data from the POST request
$data = json_decode(file_get_contents('php://input'), true);
$score = $data['score'];
$totalQuestions = $data['totalQuestions'];

// Get the username from the session
$username = $_SESSION['name'];

// Prepare and execute the SQL query
$stmt = $conn->prepare("INSERT INTO user_quiz_submission (name, score, total_questions) VALUES (?, ?, ?)");
$stmt->bind_param("sii", $username, $score, $totalQuestions);

if ($stmt->execute()) {
    echo json_encode(['message' => 'Score and username submitted successfully']);
} else {
    echo json_encode(['message' => 'Error submitting data']);
}

$stmt->close();
$conn->close();
?>
