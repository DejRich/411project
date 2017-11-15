<html>
<body>
  <?php
  include 'resources.php';
  ?>
  <style>
    input[type=text] {
      width: 50%;
    }
  </style>

  <form action="search.php" method="post">
    <?php printLoginInfo(); ?>
    <p> Search for a <select name="type">
      <option value="dish">dish</option>
      <option value="restaurant">restaurant</option>
      </select>:
    <p> <input type="text" name="search_box"> <input type="submit" value="Submit">
    <br>
  </form>
    <hr>
  <form action="main.php" method="post">
    <p> Login:
    <p> Email: <input type="text" name="email">
    <p> Password: <input type="password" name="password">
    <p> <input type="submit" value="Log in">
  </form>
    <hr>
  <form action="signup.php" method="post">
    <p>Sign up:
    <p>Email:<input type="text" name="email">
    <p>User Name:<input type="text" name="name">
    <p>Password:<input type="password" name="password">
    <p><input type="submit" value="Sign Up">
  </form>
    <hr>

  <?php
  if (loggedIn()) { ?>
  <form action="add_dish.php" method="post">
    <?php printLoginInfo(); ?>
    <p> Add Dish:
    <p> Name: <input type="text" name="name">
    <p> Spice: <input type="text" name="spice">
    <p> <input type="submit" value="Add Dish"> 
  </form>

  <form action="remove_dish.php" method="post">
    <?php printLoginInfo(); ?>
    <p> Remove Dish:
    <p> Name: <input type="text" name="name">
    <p> <input type="submit" value="Remove Dish"> 
  </form>

  <?php } ?>



</body>
</html>
