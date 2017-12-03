<html>
    <body>
    <?php
    include 'resources.php';

    $name = $_GET['name'];
    $loc = getRoughLocation();
    
    $query = "
      SELECT n.`id`, n.`name`, n.`stars`, n.`dist` 
      FROM (
      SELECT `id`, `stars`, `name`, coordDistance('". $loc['latitude'] ."', '". $loc['longitude'] ."', `latitude`, `longitude`)  AS `dist`, `latitude`, `longitude`
          FROM `business`
          WHERE coordDistance('". $loc['latitude'] ."', '". $loc['longitude'] ."', `latitude`, `longitude`) <= 5
          ORDER BY dist / stars
          LIMIT 200
      ) AS n
      WHERE EXISTS (
          SELECT 1
          FROM review r
          WHERE r.`business_id` = n.`id` AND `text` LIKE '%". $name ."%'
      )";

      $result = query($query);
      header("Content-type: text/xml");

      // Start XML file, echo parent node
      echo '<markers>';

      // Iterate through the rows, printing XML nodes for each
      while ($row = @mysql_fetch_assoc($result)){
        // Add to XML document node
        echo '<marker ';
        echo 'lat="' . $row['latitude'] . '" ';
        echo 'lng="' . $row['longitude'] . '" ';
        echo 'stars="' . $row['stars'] . '" ';
        echo '/>';
      }

      // End XML file
      echo '</markers>';
      ?>

    </body>
</html>