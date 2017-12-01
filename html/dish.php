<?php
    error_reporting( E_ALL );
?>

<html>
    <body>
    <?php
    include 'resources.php';
    $name = $_GET['name'];
    $query = "SELECT * FROM dish WHERE name=\"" . $name . "\"";
    $spice = query($query)->fetch_assoc()['spice'];
    $loc = getRoughLocation();
    ?>
    <h1><?= $name?></h1>
    <p>Spice level: <?= $spice?>

    <h2> Some restaurants that sell <?= $name?> near <?=$loc['city']?>, <?=$loc['region']?>:</h2>
    <?php
    // sqlDistance($loc['latitude'], $loc['longitude'], "`latitude`", "`longitude`")
    //$query =   "SELECT `id`, `name`, `stars`, " . sqlDistance($loc['latitude'], $loc['longitude'], "`latitude`", "`longitude`") . " AS dist
    //            FROM `business`
    //            WHERE " . sqlDistance($loc['latitude'], $loc['longitude'], "`latitude`", "`longitude`") . " <= 10
    //            AND EXISTS (
    //                SELECT *
    //                FROM `review`
    //                WHERE `review`.`business_id` = `business`.`id`
    //                    AND `text` LIKE \"%" . $name . "%\"
    //            )
    //            ORDER BY dist / stars";
    $query = "SET @p0 = '" . $loc['latitude'] ."'; SET @p1 = '". $loc['longitude'] . "'; SET @p2 = '%". $name ."%'; CALL `findNear`(@p0, @p1, @p2);";
    echo $query; // TODO: DEMO
    $result = query($query);
    prettyPrintBusiness($result);
    ?>
    </body>
</html>
