<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Search data</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('k.jpg'); /* Add your image path here */
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: whitesmoke; /* Added opacity for better readability */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="file"], input[type="text"], select, textarea {
            width: calc(100% - 16px);
            padding: 10px;
            margin-bottom: 12px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        input[type="file"]:focus,
        input[type="text"]:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #4caf50;
        }
    </style>
</head>
<body>
    <form action="notesdrop.php" method="post">
        <label for="myFile">Choose File:</label>
        <input type="file" id="myFile" name="link">
        <label> Online link: </label>
        <textarea name="Online" rows="4" cols="5"></textarea>
        <label> video link: </label>
        <textarea name="ytlink" rows="4" cols="50"></textarea>

        <label for="combinedInput">Subject:</label>
        <input list="subjectOptions" id="combinedInput" name="subject" class="subject_name">
        <datalist id="subjectOptions">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "tesst";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT subject_name FROM connectt"; // Replace with your actual table name
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['subject_name'] . '">' . $row['subject_name'] . '</option>';
                }
            } else {
                echo '<option value="">No subjects found</option>';
            }

            $conn->close();
            ?>
        </datalist>
        
        <label for="topic">Topic:</label>
        <input list="topicOptions" id="topic" name="topic" class="topic">
        <datalist id="topicOptions">
            <!-- Add your dynamic options here based on database query results -->
        </datalist>

        <input type="submit">
    </form>
</body>
</html>
