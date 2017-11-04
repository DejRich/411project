<html>
  <body>
    <?php
    include 'resources.php';
    $result = query($_POST["search_box"]);
    printSqlResults($result);
    ?>
  </body>
</html>
