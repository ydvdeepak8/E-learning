<?php
echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Search data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e3f7f6;
            margin: 0;
            padding: 20px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #f2f2f2;
        }
        
        tr:hover {
            background-color: #f5f5f5;
        }
        
        .download-link {
            color: #007bff;
            text-decoration: none;
        }
        
        .download-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>";

if(isset($_GET['query'])){
    $search = $_GET['query'];

    // Replace these connection details with your actual database connection
    $servername = "localhost";
    $username = "root";
    $password = ""; // Use an empty string if there is no password
    $dbname = "tesst"; // Replace with the actual database name

    // Create connection
    $con = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Corrected SQL query using backticks around table and column names
    $query = "SELECT * FROM `connectt` WHERE CONCAT(subject_name) LIKE '%$search%'";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        if (mysqli_num_rows($query_run) > 0) {
            echo '<table>';
            echo '<thead>
                    <tr>
                        <th>Subject</th>
                        <th>Topic</th>
                        <th>Action</th>
                        <th>Video Link</th>
                    </tr>
                </thead>';
            while ($row = mysqli_fetch_assoc($query_run)) {
                echo '<tr>
                        <td>'.$row['subject_name'].'</td>
                        <td>'.$row['topic'].'</td>
                        <td>
                            <p>
                                <a href="'.($row['link'] ? $row['link'] : $row['Online']).'" target="_blank">View</a> |
                                <a href="'.($row['link'] ? $row['link'] : $row['Online']).'" download>Download</a>
                            </p>
                        </td>
                        <td>
                            <p>
                                <a href="'.($row['ytlink'] ? $row['ytlink'] : $row['Online']).'" target="_blank">Link</a>
                            </p>
                        </td>
                    </tr>';
            }
            echo '</table>';
        } else {
            echo "<p>No results found for query: '$search'</p>";
        }
    } else {
        echo "<p>Error in query: " . mysqli_error($con) . "</p>";
    }
    
    $con->close();
}    

