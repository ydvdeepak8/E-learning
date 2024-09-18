

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST['email'];
    $Password = $_POST['Password'];
 
    

    // Hash the password
    

    // Database connection 
    $servername = "localhost";
    $username = "root";
    $password_db = "";
    $dbname = "tesst";

    $conn = new mysqli($servername, $username, $password_db, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO details (name, email, Password) VALUES (?, ? , ?)");
        $stmt->bind_param("sss", $name, $email, $Password);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
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
echo "  window.location.href = 'Book.html';";
echo "}, 1000); // Redirect after 1 seconds (adjust as needed)";
echo "</script>";
echo"<p> Thank you for your submission. Redirecting...</p>";
echo "</body>";
echo "</html>";
}
?>

