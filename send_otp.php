<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Display errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include Composer's autoloader for PHPMailer
require 'vendor/autoload.php';

// Database configuration
$host = 'localhost';
$dbname = 'tesst';
$user = 'root';
$pass = '';

// Create a new PDO instance
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}

// Utility function to generate a random OTP
function generateOtp($length = 6) {
    return substr(str_shuffle("0123456789"), 0, $length);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('Invalid email format');
    }

    // Generate OTP and expiry time
    $otp = generateOtp();
    $otp_expiry = date('Y-m-d H:i:s', time() + 300); // OTP valid for 5 minutes

    // Insert or update OTP and name in the database
   // Insert or update OTP, name, and expiry in the database
$sql = "INSERT INTO otps (email, otp, expiry, name) VALUES (:email, :otp, :expiry, :name)
ON DUPLICATE KEY UPDATE otp = :otp, expiry = :expiry, name = :name";
$stmt = $pdo->prepare($sql);

try {
$stmt->execute([
':email' => $email,
':otp' => $otp,
':expiry' => $otp_expiry,
':name' => $name
]);
echo 'OTP, name, and expiry saved successfully';
} catch (PDOException $e) {
die("Database error: " . $e->getMessage());
}


    // Send OTP to the user's email using PHPMailer
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mail->SMTPAuth = true;
        $mail->Username = 'deepakyadav85844@gmail.com';
        $mail->Password = 'cqjfvdtemaxohlch'; // Ensure to use a secure method for storing passwords
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('deepakyadav85844@gmail.com', 'SAGE');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Your OTP Code';
        $mail->Body    = "Hi $name,<br>Your OTP code is: $otp";

        $mail->send();
        echo 'OTP sent successfully';
    } catch (Exception $e) {
        echo 'Failed to send OTP: ' . $mail->ErrorInfo;
    }
}

// Close connection
$pdo = null;
?>
