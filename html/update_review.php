<html>
    <body>
        <?php
        include 'resources.php';
        function updateReview(){
            $text = $_GET["text"];
            echo $text;
            //$updateQuery = "UPDATE review SET text="
        }
        $id = $_GET["id"];
        $query = "SELECT * FROM review WHERE id=\"" . $id . "\"";
        $res = query($query);
        $row = $res->fetch_assoc();
        ?>
    <form method="get">
        <input type="text" name="text" value=<?= $row["text"] ?>>
        <input type="button" value="update" onclick="updateReview()">
        </form>
        
    </body>
</html>