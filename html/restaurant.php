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
    <p>Stars: <?= $row["stars"] ?> </p>
    <p>Address: <?= $row["address"] ?>, <?= $row["city"] ?>, <?= $row["state"] ?></p>
    
    <hr>
    <h4>Reviews:</h4>
    
    <?php
    $query = "SELECT * FROM review, user u WHERE user_id = u.id AND business_id=\"" . $id . "\"";
    $res = query($query);
    while($row = $res->fetch_assoc()){
        ?>
        <hr>
        <h4><?= $row["name"] ?> StarsL <?= $row["star"] ?> Date: <?= $row["date"] ?></h4>
        <p><?= $row["text"] ?></p>
       <?php 
    }
        ?>
    </body>
</html>
