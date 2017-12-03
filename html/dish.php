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
    $query = "
    SELECT n.`id`, n.`name`, n.`stars`, n.`dist` 
    FROM (
    SELECT `id`, `stars`, `name`, coordDistance('". $loc['latitude'] ."', '". $loc['longitude'] ."', `latitude`, `longitude`)  AS `dist`
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
    echo $query; // TODO: DEMO
    $result = query($query);
    prettyPrintBusiness($result);
    ?>
    </body>
</html>
