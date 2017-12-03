<html>
  <body>
    <?php
    include 'resources.php';

    $input = "\"%" . $_POST["search_box"] . "%\"";
    
    if ($_POST['type'] == "dish") {
        $query = "SELECT * FROM `dish` WHERE name LIKE " . $input;
        $result = query($query);
        while ($row = $result->fetch_assoc()) {
            echo "<h2>" . $row['name'] . "</h2>";
            ?>
            <form action="dish.php?name=<?= $row['name']?>" method="post">
                <?php printLoginInfo() ?>
                <input type="submit" value="more info">
            </form>
            <hr>
            <?php
        }

    } else {
        $query = "SELECT id, name, stars FROM business WHERE name LIKE " . $input . " LIMIT 1000";
        $result = query($query);
        prettyPrintBusiness($result);
    }

    ?>
  </body>
</html>
