<html>
    <body>
<?php
include 'resources.php';
$id = $_GET["id"];
$query = "SELECT * FROM business WHERE id=\"" . $id . "\"";
$res = query($query);
$row = $res->fetch_assoc();

?>

<h2> <?= $row["name"] ?> </h2>
<p> hhh </p>


    </body>
</html>
