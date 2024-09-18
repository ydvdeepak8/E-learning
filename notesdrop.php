<?php
// Assuming this PHP code is within a file named "connect.php"

// Process form data and insert into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $subject_name = isset($_POST["subject"]) ? $_POST["subject"] : '';
    $topic = isset($_POST["topic"]) ? $_POST["topic"] : '';
    $link = isset($_POST["link"]) ? $_POST["link"] : '';
    $Online = isset($_POST["Online"]) ? $_POST["Online"] : '';
    $ytlink = isset($_POST["ytlink"]) ? $_POST["ytlink"] : '';

    // Check if both link and Online are empty or not
    if (empty($link) && empty($Online)) {
       
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Loading Page</title>
            <style>
                body {
                    font-family: 'Arial', sans-serif;
                    background-color: #f4f4f4;
                    margin: 0;
                    padding: 0;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                }
        
                .loading-container {
                    text-align: center;
                }
        
                .loading-spinner {
                    border: 8px solid rgba(255, 255, 255, 0.3);
                    border-top: 8px solid #3498db;
                    border-radius: 50%;
                    width: 40px;
                    height: 40px;
                    animation: spin 1s linear infinite;
                    margin: 0 auto;
                    margin-bottom: 20px;
                }
        
                .progress-bar-container {
                    width: 100%;
                    height: 20px;
                    background-color: #eee;
                    position: relative;
                }
        
                .progress-bar {
                    height: 100%;
                    width: 0;
                    background-color: #3498db;
                    animation: fill 3s ease-in-out forwards; /* Adjust the duration as needed */
        
                @keyframes spin {
                    0% { transform: rotate(0deg); }
                    100% { transform: rotate(360deg); }
                }
        
                @keyframes fill {
                    0% { width: 0; }
                    100% { width: 100%; }
                }
            </style>
        </head>
        <body>
            <div class='loading-container'>
                <div class='loading-spinner'></div>
                
                <p>Error: Both link and Online cannot be empty</p>
            </div>
            <script>
                setTimeout(function() {
                    window.location.href = 'nd.php';
                }, 2000); // Redirect after 17 seconds (adjust as needed)
            </script>
        </body>
        </html>";
        exit;
    } elseif (!empty($link) && !empty($Online)) {
       
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Loading Page</title>
            <style>
                body {
                    font-family: 'Arial', sans-serif;
                    background-color: #f4f4f4;
                    margin: 0;
                    padding: 0;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                }
        
                .loading-container {
                    text-align: center;
                }
        
                .loading-spinner {
                    border: 8px solid rgba(255, 255, 255, 0.3);
                    border-top: 8px solid #3498db;
                    border-radius: 50%;
                    width: 40px;
                    height: 40px;
                    animation: spin 1s linear infinite;
                    margin: 0 auto;
                    margin-bottom: 20px;
                }
        
                .progress-bar-container {
                    width: 100%;
                    height: 20px;
                    background-color: #eee;
                    position: relative;
                }
        
                .progress-bar {
                    height: 100%;
                    width: 0;
                    background-color: #3498db;
                    animation: fill 3s ease-in-out forwards; /* Adjust the duration as needed */
        
                @keyframes spin {
                    0% { transform: rotate(0deg); }
                    100% { transform: rotate(360deg); }
                }
        
                @keyframes fill {
                    0% { width: 0; }
                    100% { width: 100%; }
                }
            </style>
        </head>
        <body>
            <div class='loading-container'>
                <div class='loading-spinner'></div>
                
                <p>Error:Error: Both link and Online cannot have values simultaneously.</p>
            </div>
            <script>
                setTimeout(function() {
                    window.location.href = 'nd.php';
                }, 2000); // Redirect after 17 seconds (adjust as needed)
            </script>
        </body>
        </html>";
        exit;
    } else {
        // Ensure that subject_name is not null before processing the form
        if ($subject_name !== null) {
            // Modify link based on conditions
            if (!empty($link)) {
                $link = "http://localhost/EBook/" . $link;
                $Online = ''; // If link is not empty, set Online to empty
            } elseif (!empty($Online)) {
                $link = ''; // If Online is not empty, set link to empty
            }

            // Use the retrieved data as needed (e.g., store in the database, send an email, etc.)
            // Remember to validate and sanitize user input before using it in any database operations

            // For example, to store data in a database using mysqli:
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "tesst";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Use prepared statements to prevent SQL injection
            $stmt = $conn->prepare("INSERT INTO connectt (subject_name, topic, link, Online, ytlink) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $subject_name, $topic, $link, $Online, $ytlink);

            if ($stmt->execute()) {
                // Success
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
            $conn->close();
        } else {
            // Handle the case when subject_name is null
            echo "Error: Subject is not set.";
        }
    }
}

// Display loading page HTML
echo "<!DOCTYPE html>";
    echo "<html lang='en'>";
    echo "<head>";
    echo "<style>";
    echo "body {";
    echo "  background-color: #f5f5f1;";
    echo "  display: flex;";
    echo "  justify-content: center;";
    echo "  align-items: center;";
    echo "  height: 100vh;";
    echo "}";
    echo "@keyframes book-bounce {";
    echo "  0% { transform: translateY(0); }";
    echo "  40% { transform: translateY(-10px); }";
    echo "  80% { transform: translateY(0); }";
    echo "  100% { transform: translateY(0); }";
    echo "}";
    echo "@keyframes shelf-lift {";
    echo "  0% { transform: translateY(0) rotate(0); }";
    echo "  20% { transform: translateY(-4px) rotate(10deg); }";
    echo "  40% { transform: translateY(-4px) rotate(0); }";
    echo "  40% { transform: translateY(-4px) rotate(-10deg); }";
    echo "  80% { transform: translateY(0); }";
    echo "  100% { transform: translateY(0); }";
    echo "}";
    echo ".book-shelf {";
    echo "  cursor: pointer;";
    echo "}";
    echo ".book-shelf__book {";
    echo "  animation: book-bounce 0.4s ease infinite;";
    echo "  animation-delay: 0s;";
    echo "}";
    echo ".book-shelf__book--two {";
    echo "  animation-delay: 0.04s;";
    echo "}";
    echo ".book-shelf__book--three {";
    echo "  animation-delay: 0.08s;";
    echo "}";
    echo ".book-shelf__shelf {";
    echo "  animation: shelf-lift 0.4s ease infinite;";
    echo "  transform-origin: 50% 50%;";
    echo "}";
    echo "</style>";
    echo "<meta charset='UTF-8'>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "<title>Document</title>";
    echo "</head>";
    echo "<body>";
    echo "<svg class='book-shelf' xmlns='http://www.w3.org/2000/svg' preserveAspectRatio='xMidYMid' viewBox='0 0 84 94' height='94' width='84'>";
    echo "<path fill='none' d='M37.612 92.805L4.487 73.71c-2.75-1.587-4.45-4.52-4.45-7.687L.008 27.877c-.003-3.154 1.676-6.063 4.405-7.634L37.558 1.167c2.73-1.57 6.096-1.566 8.835.013l33.124 19.096c2.75 1.586 4.45 4.518 4.45 7.686l.028 38.146c.002 3.154-1.677 6.063-4.406 7.634L46.445 92.818c-2.73 1.57-6.096 1.566-8.834-.013z'/>";
    echo "<g class='book-shelf__book book-shelf__book--one' fill-rule='evenodd'>";
    echo "<path fill='#5199fc' d='M31 29h4c1.105 0 2 .895 2 2v29c0 1.105-.895 2-2 2h-4c-1.105 0-2-.895-2-2V31c0-1.105.895-2 2-2z'/>";
    echo "<path fill='#afd7fb' d='M34 36h-2c-.552 0-1-.448-1-1s.448-1 1-1h2c.552 0 1 .448 1 1s-.448 1-1 1zm-2 1h2c.552 0 1 .448 1 1s-.448 1-1 1h-2c-.552 0-1-.448-1-1s.448-1 1-1z'/>";
    echo "</g>";
    echo "<g class='book-shelf__book book-shelf__book--two' fill-rule='evenodd'>";
    echo "<path fill='#ff9868' d='M39 34h6c1.105 0 2 .895 2 2v24c0 1.105-.895 2-2 2h-6c-1.105 0-2-.895-2-2V36c0-1.105.895-2 2-2z'/>";
    echo "<path fill='#d06061' d='M42 38c1.105 0 2 .895 2 2s-.895 2-2 2-2-.895-2-2 .895-2 2-2z'/>";
    echo "</g>";
    echo "<g class='book-shelf__book book-shelf__book--three' fill-rule='evenodd'>";
    echo "<path fill='#ff5068' d='M49 32h2c1.105 0 2 .86 2 1.92v25.906c0 1.06-.895 1.92-2 1.92h-2c-1.105 0-2-.86-2-1.92V33.92c0-1.06.895-1.92 2-1.92z'/>";
    echo "<path fill='#d93368' d='M50 35c.552 0 1 .448 1 1v2c0 .552-.448 1-1 1s-1-.448-1-1v-2c0-.552.448-1 1-1z'/>";
    echo "</g>";
    echo "<g fill-rule='evenodd'>";
    echo "<path class='book-shelf__shelf' fill='#ae8280' d='M21 60h40c1.105 0 2 .895 2 2s-.895 2-2 2H21c-1.105 0-2-.895-2-2s.895-2 2-2z'/>";
    echo "<path fill='#855f6d' d='M51.5 67c-.828 0-1.5-.672-1.5-1.5V64h3v1.5c0 .828-.672 1.5-1.5 1.5zm-21 0c-.828 0-1.5-.672-1.5-1.5V64h3v1.5c0 .828-.672 1.5-1.5 1.5z'/>";
    echo "</g>";
    echo "</svg>";
    
    echo "<script>";
    echo "document.addEventListener('DOMContentLoaded', function() {";
    echo "  const bookShelf = document.querySelector('.book-shelf');";
    echo "  bookShelf.classList.add('book-shelf--animate');";
    echo "});";
    
    echo "setTimeout(function() {";
    echo "  window.location.href = 'recom.php';";
    echo "}, 1000); // Redirect after 1 seconds (adjust as needed)";
    echo "</script>";
    echo"<p> Enter Book details </p>";
    echo "</body>";
    echo "</html>";
?>
