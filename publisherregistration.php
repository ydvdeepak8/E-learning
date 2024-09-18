<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Search data</title>
    <style>
          body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="file"], input[type="text"], select {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form action="notesdrop.php" method="post">
    <label for="file">Upload Book File:</label>
      <input type="file" id="file" name="file">
      <label for="online_link">Online Link:</label>
      <input type="url" id="online_link" name="online_link" >

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
        <input list="topicOptions" id="topic" name="topic" class="topic" required>
        <datalist id="topicOptions">
            <!-- Add your dynamic options here based on database query results -->
        </datalist>

        <input type="submit">
    </form>
</body>
</html>
