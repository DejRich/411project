<?php
    include 'resources.php';
    $id = $_GET["id"];
    $bid = $_GET["bid"];
    $text = $_GET["text"];
    $query = "UPDATE review SET text='" . addslashes($text) . "' WHERE id='" . $id . "'";
    $res = update($query);
?>
<br>
<a href="restaurant.php?id=<?= $bid?>" >Return</a>
