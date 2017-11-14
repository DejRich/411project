<html>
    <body>
    <?php
    $bid = $_GET["bid"];
    ?>
    <form action="insert_review_next.php" method="get">
        <!-- collect info for insert 
        Name:<input type="text" name="name">
        <br> -->
        Star:<input type="text" name="stars">
        <br>
        Review:
        <br>
        <textarea name="text" rows="10" cols="70"></textarea>
        <input type="hidden" name="bid" value=<?=$bid?>>
        <br>
        <input type="submit">
    </form>
    </body>
</html>
