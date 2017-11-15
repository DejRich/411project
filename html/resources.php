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

function update($query) {
  // update using superuser, need update later
  $conn = new mysqli($GLOBALS['dbserver'], 'syang104', 'CS411$Project', $GLOBALS['dbname']);
  if ($conn->connect_error) {
    dir("Connection failed: " . $conn->connect_error);
  }
  if ($conn->query($query) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
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
        ?>
        <h2><?= $row["name"]?> </h2>
        <p>Stars: <?= $row["stars"] ?> <p>
        <form action="restaurant.php?id=<?= $row["id"]?>" method="post">
            <?php printLoginInfo() ?>
            <input type="submit" value="more info">
        </form>
        <hr>
        <?php
    }
}

function getNumRowsInTable($table) {
    $query = "SELECT table_rows FROM information_schema.tables WHERE table_schema = 'yelp_db' AND table_name = '$table'";
    return query($query)->fetch_assoc()['table_rows'];
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

// returns the row in users about the currently signed in user
function getUserRow() {
    $result = query("SELECT * FROM user WHERE email IS NOT NULL AND password IS NOT NULL AND email = \"" . $_POST['email'] . "\" AND password = \"" . $_POST['password'] . "\"");
    return $result->fetch_assoc();
}

// use this in a form to maintain login info
function printLoginInfo() {
    if (loggedIn()) {
        echo "<input type=\"hidden\" name=\"email\" value=\"" . $_POST['email'] . "\">";
        echo "<input type=\"hidden\" name=\"password\" value=\"" . $_POST['password'] . "\">";
    }
}


// auto login if email and password are in POST
if ($_POST['email'] != '' && $_POST['password'] != '') {
    login($_POST['email'], $_POST['password']);
}

// greet user if logged in successfully
if (loggedIn()) {
    echo "Welcome " . $_POST['email'] . "!<br>";
}

// create button to return to main page
?>
<form action="main.php" method="post">
    <?php
    if (loggedIn()) {
        printLoginInfo();
    }
    ?>
    <input type="submit" value="Main page">
</form>
<?php

// create log out button
if (loggedIn()) {
    ?>
    <form action="main.php">
        <input type="submit" value="Log out">
    </form>
    <?php
}
?>
