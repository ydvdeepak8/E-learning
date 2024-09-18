<?php
session_start();

// Database connection parameters
$servername = "localhost";
$username = "root";
$password_db = "";
$dbname = "tesst";

// Create connection
$conn = new mysqli($servername, $username, $password_db, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name= $_POST["name"];
    $Password = $_POST["Password"];

    // Fetch user data from the database
    $stmt = $conn->prepare("SELECT * FROM details WHERE name = ? AND Password = ?");
    $stmt->bind_param("ss", $name, $Password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows >= 0) {
        // Login successful
        $_SESSION['user'] = $result->fetch_assoc();
        header("Location: tt.html");
        exit();
    } else {
        $_SESSION['message'] = 'Invalid email or password. Please try again.';
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login Form</h2>
    
    <?php
    if (isset($_SESSION['message'])) {
        echo "<p>{$_SESSION['message']}</p>";
        unset($_SESSION['message']);
    }
    ?>

    <form action="login.php" method="post">
        <label for="name">name:</label>
        <input type="name" id="name" name="name" required><br>

        <label for="Password">Password:</label>
        <input type="Password" id="Password" name="Password" required><br>

        <input type="submit"name="submit"  value="submit" class="btn btn-primary">
    </form>

    <p>Don't have an account? <a href="register.php">Register here</a></p>
</body>
</html>
