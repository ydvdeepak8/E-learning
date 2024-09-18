<?php
session_start();

// GitHub OAuth credentials
$client_id = 'Ov23liGy4bofQUYK4xjf';
$client_secret = '0440c5f6048c15cc9ac21e40c2269e38ae9fb098';
$redirect_uri = 'http://localhost/Loginacc/github_callback.php';

// Verify state parameter to prevent CSRF attacks
if (isset($_GET['code']) && isset($_GET['state']) && isset($_SESSION['state']) && $_SESSION['state'] === $_GET['state']) {
    $code = $_GET['code'];

    // Exchange authorization code for access token
    $token_url = 'https://github.com/login/oauth/access_token';
    $data = [
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'code' => $code,
        'redirect_uri' => $redirect_uri
    ];

    $options = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        ]
    ];
    $context  = stream_context_create($options);
    $response = file_get_contents($token_url, false, $context);
    parse_str($response, $response_params);

    if (isset($response_params['access_token'])) {
        $access_token = $response_params['access_token'];

        // Fetch user information from GitHub
        $user_url = 'https://api.github.com/user';
        $options = [
            'http' => [
                'header'  => "Authorization: token $access_token\r\nUser-Agent: your-app-name\r\n",
                'method'  => 'GET'
            ]
        ];
        $context  = stream_context_create($options);
        $user_info = file_get_contents($user_url, false, $context);
        $user_info = json_decode($user_info, true);

        // Check if email is available
        if (isset($user_info['email'])) {
            $email = $user_info['email'];
            $name = $user_info['name'];
            $login_method = 'github'; // Specify the login method

            // Connect to database
            $servername = "localhost";
            $username = "root"; // Default XAMPP MySQL username
            $password = ""; // Default XAMPP MySQL password
            $dbname = "tesst";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Prepare and execute SQL statement
            $stmt = $conn->prepare("INSERT INTO users (email, login_method) VALUES (?, ?) ON DUPLICATE KEY UPDATE login_method = VALUES(login_method)");
            $stmt->bind_param("ss", $email, $login_method);

            if ($stmt->execute()) {
                echo "Logged in as: $name ($email)";
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close connection
            $stmt->close();
            $conn->close();
        } else {
            echo "Error: No email returned from GitHub.";
        }
    } else {
        echo "Error: Access token not received.";
    }
} else {
    echo "Error: Invalid state or code parameter.";
}
?>
