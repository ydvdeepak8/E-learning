<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search data</title>
    <style>
        .book-container {
            border: 2px solid #ddd;
            border-radius: 8px;
            width: 300px;
            height: 425px ;
            overflow: hidden;
            margin: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .book-container:hover {
            transform: scale(1.05);
        }
        .book-image {
            width: 300px;
            height: 175px ;
            border-bottom: 2px solid #ddd;
        }

        .book-details {
            padding: 15px;
        }

        .book-title {
            font-size: 18px;
            margin-bottom: 10px;
            color: #333;
        }

        .author, .topic {
            font-size: 14px;
            color: #666;
        }

        .buttons-container {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            background-color: #f5f5f5;
        }

        .buy-button, .favorites-button {
            padding: 8px 15px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .buy-button:hover, .favorites-button:hover {
            background-color: #2980b9;
        }

        .favorites-list {
            list-style-type: none;
            padding: 0;
        }

        .favorites-list li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Search Results</h1>
    <div id="books-container">
        <!-- Book containers will be dynamically added here -->
    </div>
    <div class="favorites">
        <h2>My Favorite Books</h2>
        <ul id="favorites-list" class="favorites-list">
            <!-- Favorites will be dynamically added here -->
        </ul>
    </div>
</div>

<script>
    // Function to add a book to favorites
    function addToFavorites(bookName) {
        const favoritesList = document.getElementById('favorites-list');
        const listItem = document.createElement('li');
        listItem.textContent = bookName;
        favoritesList.appendChild(listItem);
    }

    // Dummy function to simulate AJAX request
    function buyBook(bookName) {
        alert('Buying ' + bookName);
    }
</script>

<?php
if(isset($_GET['query'])){
    $search = $_GET['query'];

    // Replace these connection details with your actual database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tesst";

    // Create connection
    $con = new mysqli($servername, $username, $password, $dbname);

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $query = "SELECT * FROM `booksearch` WHERE CONCAT(Book_name, ' ', author) LIKE '%$search%'";

    $query_run = mysqli_query($con, $query);

    if($query_run){
        if(mysqli_num_rows($query_run) > 0) {
            while($row = mysqli_fetch_assoc($query_run)) {
                echo '
                <div class="book-container">
                    <img src="' . $row['link'] . '" alt="' . $row['Book_name'] . '" class="book-image">
                    <div class="book-details">
                    <h2 class="price">Price: $' . $row['price'] . '</h2>
                        <h3 class="book-title">' . $row['Book_name'] . '</h3>
                        <p class="author">Author: ' . $row['author'] . '</p>
                        <p class="topic">Topic: ' . $row['topic'] . '</p>
                    </div>
                    <div class="buttons-container">
                        <button class="buy-button" onclick="buyBook(\'' . $row['Book_name'] . '\')">Buy</button>
                        <button class="favorites-button" onclick="addToFavorites(\'' . $row['Book_name'] . '\')">Add to Favorites</button>
                    </div>
                </div>';
            }
        } else {
            echo "No results found for query: '$search'";
        }
    } else {
        echo "Error in query: " . mysqli_error($con);
    }

    $con->close();
}
?>
</body>
</html>
