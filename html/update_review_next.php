<?php
    include 'resources.php';
    $id = $_POST["id"];
    $bid = $_POST["bid"];
    $stars = $_POST["stars"];
    $text = $_POST["text"];
    $action = $_POST["query"];
    $date = date("Y-m-d H:i:s");
    if($action == "update"){
        $query = "UPDATE review SET stars='" . addslashes($stars) . "', text='" . addslashes($text) . "', date='". $date ."' WHERE id='" . $id . "'";
    }
    if($action == "delete"){
        $query = "DELETE FROM review WHERE id='" .$id. "'";
    }
    $res = update($query);
?>
<br>
<form action="restaurant.php?id=<?= $bid?>" method="post">
    <?php printLoginInfo() ?>
    <input type="submit" value="Return">
</form>
