<html>
    <body>
    <?php
    include 'resources.php';
    $name = $_GET['name'];
    $query = "SELECT * FROM dish WHERE name=\"" . $name . "\"";
    $spice = query($query)->fetch_assoc()['spice'];
    ?>
    <h1><?= $name?></h1>
    <p>Spice level: <?= $spice?>

    <h2> Some restaurants that sell <?= $name?>:</h2>
    <?php
    $query = "SELECT id,name,stars FROM`business` WHERE id IN ( SELECT * FROM ( SELECT DISTINCT(business_id) AS id FROM `review` WHERE `text` LIKE \"%" . $name . "%\" LIMIT 100 ) AS t )";
    $result = query($query);
    prettyPrintBusiness($result);
    ?>
    </body>
</html>
