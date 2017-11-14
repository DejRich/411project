<?php
    include 'resources.php';
    $id = $_GET["id"];
    $bid = $_GET["bid"];
    $text = $_GET["text"];
    $action = $_GET["query"];
    if($action == "update"){
        $query = "UPDATE review SET text='" . addslashes($text) . "' WHERE id='" . $id . "'";
    }
    if($action == "delete"){
        $query = "DELETE FROM review WHERE id='" .$id. "'";
    }
    $res = update($query);
?>
<br>
<a href="restaurant.php?id=<?= $bid?>" >Return</a>
