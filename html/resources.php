<?php
$dbuser = "visitor";
$dbpass = "Asdf1234!@#$";
$dbserver = "localhost";
$dbname = "yelp_db";


function query($query) {
  // connect
  $conn = new mysqli($GLOBALS['dbserver'], $GLOBALS['dbuser'], $GLOBALS['dbpass'], $GLOBALS['dbname']);
  if ($conn->connect_error) {
    dir("Connection failed: " . $conn->connect_error);
  }
  return $conn->query($query);
}


function printSqlResults($result) {
  if ($result->num_rows > 0) {
    for ($i = 1; $row = $result->fetch_assoc(); $i++) {
      echo "$i<br>";
      foreach ($row as $key => $value) {
        echo "&nbsp&nbsp&nbsp&nbsp$key: $value<br>";
      }
    }
  } else {
    echo "No results<br>";
  }
}
?>
