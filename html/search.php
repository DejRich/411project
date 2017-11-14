<html>
  <body>
    <?php
    include 'resources.php';
    $input = "\"%" . $_POST["search_box"] . "%\"";
    $query = "SELECT * FROM business WHERE name LIKE " . $input . "LIMIT 10";
    $result = query($query);
    prettyPrintBusiness($result);
    ?>
  </body>
</html>
