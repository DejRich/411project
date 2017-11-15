<html>
    <body>
    
    <?php 

        include 'resources.php';
        $name = $_POST["name"];

        $query = "
        DELETE FROM `yelp_db`.`dish` WHERE `name` = \"$name\""; 

        $res = query($query);
        //echo "" . $query;
        if ($res == 1) {
            echo "Successfully deleted ".$name;
        }else{
            echo "Delete of ".$name." failed";
        }
    ?>

    
    </body>
</html>
