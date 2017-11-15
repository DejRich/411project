<html>
    <body>
    <?php
    include 'resources.php';
    $name = $_POST["name"];
    $stars = $_POST["stars"];
    $text = $_POST["text"];
    $bid = $_POST["bid"];

    $userInfo = getUserRow();
    $userID = $userInfo['id'];
    $date = date("Y-m-d H:i:s");
    $id = getNumRowsInTable('review');

	$query = "INSERT INTO `yelp_db`.`review` (`id`, `stars`, `date`, `text`, `useful`, `funny`, `cool`, `business_id`, `user_id`) VALUES ('$id', '$stars', '$date', '$text', '0', '0', '0', '$bid', '$userID')";
    
    $res = query($query);
    if ($res) {
        echo "Review added successfully! (id=$id)";
    } else {
        echo "Failed to add review";
    }
    ?>
    <br>
    <form action="restaurant.php?id=<?= $bid?>" method="post">
        <?php printLoginInfo() ?>
        <input type="submit" value="Return">
    </form>
    </body>
</html>
