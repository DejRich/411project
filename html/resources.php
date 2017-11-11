<?php
$visitorName = "visitor";
$visitorPass = "Asdf1234!@#$";
$userName = "user";
$userPass = "$#@!4321fdsA";

$dbuser = $visitorName;
$dbpass = $visitorPass;
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
        echo "&nbsp&nbsp&nbsp$key: $value<br>";
      }
    }
  } else {
    echo "No results<br>";
  }
}


function prettyPrintBusiness($res) {
    while($row = $res->fetch_assoc()){
        echo "<h2>" . $row["name"] . "</h2>";
        echo "<p>Address: " . $row["address"] . "</p>";
        echo "<p>Stars: " . $row["stars"] . "</p>";
        echo "<hr>";
    }


}


function login($email,$password) {
    $result = query("SELECT * FROM user WHERE email IS NOT NULL AND password IS NOT NULL AND email = \"" . $email . "\" AND password = \"" . $password . "\"");
    if ($result->num_rows != 0) {
        $GLOBALS['dbuser'] = $GLOBALS['userName'];
        $GLOBALS['dbpass'] = $GLOBALS['userPass'];
        return True;
    }
    return False;
}

function logout() {
    $GLOBALS['dbuser'] = $GLOBALS['visitorName'];
    $GLOBALS['dbpass'] = $GLOBALS['visitorPass'];
}

function loggedIn() {
    return $GLOBALS['dbuser'] != $GLOBALS['visitorName'];
}
?>
