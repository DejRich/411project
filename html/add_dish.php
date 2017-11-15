<html>
    <body>
    
    <?php
        include 'resources.php';
        
        $name = $_POST["name"];
        $spice = $_POST["spice"];

        $query = "INSERT INTO `yelp_db`.`dish` (`name`, `spice`) VALUES ('$name', '$spice')";

        $res = query($query);

        if ($res) {
            echo "Added $name successfully!";
        } else {
            echo "Unable to add $name.";
        }
    ?>

    
    </body>
</html>

