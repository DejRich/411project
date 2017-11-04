<?php
    $servername = "localhost";
    $username = "visitor";
    $password = "Asdf1234!@#$";
    $dbname = "yelp_db";

    // connect to server
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        dir("Connection failed: " . $conn->connect_error);
    }

    echo "The number of reviews in the database is:  ";

    // query database
    $query = "SELECT * FROM review LIMIT 1";
    $result = $conn->query($query);

    // print result
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "" . $row["text"];
        }
    } else {
        echo "No result";
    }

    $conn->close();
?>
