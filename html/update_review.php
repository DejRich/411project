<html>
    <body>
        <?php
        include 'resources.php';
        $id = $_GET["id"];
        $query = "SELECT * FROM review WHERE id=\"" . $id . "\"";
        $res = query($query);
        $row = $res->fetch_assoc();
        ?>

        <form action="update_review_next.php" method="get">
            Review:<br>
            <textarea name="text" rows="10" cols="70"><?= $row["text"] ?></textarea>
            <input type=hidden name="id" value=<?=$id?> >
            <input type=hidden name="bid" value=<?=$row["business_id"]?> >
            <br>
            <button name="query" type="submit" value="update">Update</button>
            <button name="query" type="submit" value="delete">Delete</button>
        </form>
        
    </body>
</html>
