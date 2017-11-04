<html>
  <body>
    <?php
    include 'resources.php';
    $input = "\"%" . $_POST["search_box"] . "%\"";
    $query = "SELECT * FROM business WHERE name LIKE  " . $input;
    //Now you should be able to search a restaurant by name. --Shen
    $result = query($query);
    printSqlResults($result);
    ?>
  </body>
</html>
