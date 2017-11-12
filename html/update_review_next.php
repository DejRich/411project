<?php
    include 'resources.php';
    $id = $_GET["id"];
    $bid = $_GET["bid"];
    $text = $_GET["text"];
    //$query = "UPDATE review SET text=\"" . $text . "\" WHERE id=\"" . $id . "\"";
    //$res = query($query);
?>
<a href="restaurant.php?id=<?= $bid?>" > Done </a>