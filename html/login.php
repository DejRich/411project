<html>
  <body>
    <?php
    include 'resources.php';
    if (login($_POST["email"], $_POST["password"])) {
        echo "Success!";
    } else {
        echo "Failed!";
    }
    ?>
  </body>
<html>
