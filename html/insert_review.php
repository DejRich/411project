<html>
    <body>
    <?php
    include 'resources.php';
    $bid = $_GET["bid"];
    ?>
    <form action="insert_review_next.php" method="post">
        <!-- collect info for insert 
        Name:<input type="text" name="name">
        <br> -->
        <?php printLoginInfo()?>
        <p> Stars:<select name="stars">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <br>
        <p> Review:
        <br>
        <textarea name="text" rows="10" cols="70"></textarea>
        <input type="hidden" name="bid" value=<?=$bid?>>
        <br>
        <input type="submit" value="Submit review">
    </form>
    </body>
</html>
