<?php
require_once 'vendor/autoload.php';

session_start();

// Create and configure Google Client
$client = new Google_Client();
$client->setClientId(getenv('GOOGLE_CLIENT_ID')); // Use environment variable
$client->setClientSecret(getenv('GOOGLE_CLIENT_SECRET')); // Use environment variable
$client->setRedirectUri(getenv('REDIRECT_URI')); // Use environment variable or set this manually for production

if (isset($_GET['code'])) {
    $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();
    $oauth2 = new Google_Service_Oauth2($client);
    $user_info = $oauth2->userinfo->get();

    $email = $user_info->email;
    $name = $user_info->name;  // Get the user's name
    $login_method = 'google';  // Specify that the login method is Google

    // Database configuration using environment variables
    $servername = getenv('DB_HOST'); // Use environment variable
    $username = getenv('DB_USER'); // Use environment variable
    $password = getenv('DB_PASS'); // Use environment variable
    $dbname = getenv('DB_NAME'); // Use environment variable

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize input
    $email = $conn->real_escape_string($email);
    $name = $conn->real_escape_string($name);  // Sanitize the name
    $login_method = $conn->real_escape_string($login_method);

    // Check if user already exists
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists, update if necessary
        $_SESSION['user_name'] = $name;  // Store name in session
        header("Location: success_page.php");
    } else {
        // New user, insert into database with the name
        $sql = "INSERT INTO users (email, name, login_method) VALUES ('$email', '$name', '$login_method')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['user_name'] = $name;  // Store name in session
            header("Location: success_page.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close connection
    $conn->close();

} else {
    echo "Error: No code parameter found.";
}
?>
