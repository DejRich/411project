<html>
    <body>
        <?php
        include 'resources.php';
        function updateReview(){
        $id = $_GET["id"];
        $query = "SELECT * FROM review WHERE id=\"" . $id . "\"";
        $res = query($query);
        $row = $res->fetch_assoc();
        ?>

        <form action="" method="get">
            Review:<br>
            <textarea name="text" rows="10" cols="70"><?= $row["text"] ?></textarea>
            <input type=hidden name="id" value=<?=$id?> >
            <input type=hidden name="bid" value=<?=$row["business_id"]?> >
            <br>
            <input type="submit" value="update">
        </form>
        
    </body>
</html>
