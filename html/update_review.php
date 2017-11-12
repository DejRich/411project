<html>
    <body>
        <?php
        include 'resources.php';
        
            //$text = $_GET["text"];
            echo "<p> gw </p>";
            //$updateQuery = "UPDATE review SET text="
        
        $id = $_GET["id"];
        $query = "SELECT * FROM review WHERE id=\"" . $id . "\"";
        $res = query($query);
        $row = $res->fetch_assoc();
        echo "<p>" . $row["text"] . "</p>"; 
                ?>
        <form method="get">
            <input type="text" name="text" value=<?= $row["text"] ?>>
            <input type="button" value="update" onclick="updateReview()">
        </form>
        
    </body>
</html>
