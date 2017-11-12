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
    <p>Address: <?= $row["address"] ?></p>
    <p>City: <?= $row["city"] ?></p>
    <p>State: <?= $row["state"] ?></p>
    <?php
        
        ?>
    
    
    <br>
    <h4>Reviews:</h4>
    
    <?php
    $query = "SELECT * FROM review r, user u WHERE r.user_id = u.id AND r.business_id=\"" . $id . "\"";
    $res = query($query);
    while($row = $res->fetch_assoc()){
        ?>
        <hr>
        <h4><?= $row["name"] ?></h4>
        <h5>Stars: <?= $row["stars"] ?></h5> 
        <h5>Date: <?= $row["date"] ?></h5>
        <p><?= $row["text"] ?></p>
        <form action="update_review.php?id=<?= $row["r.id"] ?>">
            <input type="submit" value="Update Review">
        </form>
       <?php 
    }
        ?>
    </body>
</html>
