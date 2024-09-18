<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database configuration
require 'vendor/autoload.php';

$host = 'localhost';
$dbname = 'tesst'; // Your database name
$user = 'root'; // Default XAMPP MySQL user
$pass = ''; // Default XAMPP MySQL password

// Create a new PDO instance
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}

// Validate and sanitize the email and OTP
if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    die('Invalid email address');
}
if (!isset($_POST['otp']) || empty($_POST['otp'])) {
    die('OTP cannot be empty');
}

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$enteredOtp = filter_var($_POST['otp'], FILTER_SANITIZE_STRING);

// Debugging output (optional)
// echo "Received Email: $email\n";
// echo "Received OTP: $enteredOtp\n";

// Retrieve OTP and expiry from the database
$sql = "SELECT otp, expiry FROM otps WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->execute([':email' => $email]);
$otpData = $stmt->fetch(PDO::FETCH_ASSOC);

if ($otpData !== false) {
    $storedOtp = $otpData['otp'];
    $expiryTime = strtotime($otpData['expiry']);

    // Debugging output (optional)
    // echo "Stored OTP: $storedOtp\n";
    // echo "Expiry Time: $expiryTime\n";
    // echo "Current Time: " . time() . "\n";

    // Check if OTP is expired
    if (time() > $expiryTime) {
        echo 'OTP has expired. Please request a new OTP.';
        
        // Optionally delete the expired OTP record
        $stmt = $pdo->prepare("DELETE FROM otps WHERE email = :email");
        $stmt->execute([':email' => $email]);
        exit;
    }

    // Verify OTP
    if ($enteredOtp === $storedOtp) {
        echo 'OTP verified successfully';
      // Nullify OTP and expiry after successful verification
$stmt = $pdo->prepare("UPDATE otps SET otp = NULL, expiry = NULL WHERE email = :email");
$stmt->execute([':email' => $email]);

        
        // Redirect or perform further actions after successful login
        // header('Location: success_page.php'); // Uncomment to redirect to a success page
    } else {
        echo 'Invalid OTP. Please try again.';
    }
} else {
    echo 'No OTP found for this email. Please request a new OTP.';
}
?>
<?php
// Display errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connect to the database
$servername = "localhost";
$username = "root"; // Default XAMPP MySQL username
$password = ""; // Default XAMPP MySQL password
$dbname = "tesst";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $login_method = $_POST["login_method"]; // Get the login method (email, GitHub, Google)

    // Debug: Check if the form values are coming through
    if (empty($email) || empty($login_method)) {
        die("Email or login method is missing.");
    }

    // Sanitize input
    $email = $conn->real_escape_string($email);
    $login_method = $conn->real_escape_string($login_method);

    // Debug: Check if the email is sanitized properly
    echo "Email: $email<br>";
    echo "Login Method: $login_method<br>";

    // Check if the user exists
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result === FALSE) {
        die("Error: " . $conn->error); // Display query error
    }

    if ($result->num_rows > 0) {
        // User exists, login successful
        echo "Welcome back! You are logged in.";
    } else {
        // New user, insert into database
        $sql = "INSERT INTO users (email, login_method) VALUES ('$email', '$login_method')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful. Welcome!";
        } else {
            echo "Error: " . $conn->error; // More detailed error message
        }
    }
}

// Close connection
$conn->close();
?>
