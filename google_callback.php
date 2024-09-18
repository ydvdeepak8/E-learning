<?php
require_once 'vendor/autoload.php';

session_start();

// Create and configure Google Client
$client = new Google_Client();
$client->setClientId('631821749808-3t05lboh8g4i7gbvn6tkq255g3o0po3l.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/E-learning/google_callback.php');

if (isset($_GET['code'])) {
    $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();
    $oauth2 = new Google_Service_Oauth2($client);
    $user_info = $oauth2->userinfo->get();

    $email = $user_info->email;
    $name = $user_info->name;  // Get the user's name
    $login_method = 'google';  // Specify that the login method is Google

    // Connect to the database
    $servername = "localhost";
    $username = "root";  // Default XAMPP MySQL username
    $password = "";      // Default XAMPP MySQL password
    $dbname = "tesst";

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
