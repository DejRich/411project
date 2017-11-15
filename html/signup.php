<html>
    <body>
<?php
    include 'resources.php';
    $email= $_POST["email"];
    $name = $_POST["name"];
    $pw = $_POST["password"];
    echo $name;
    $res = query("SELECT COUNT(id) FROM user");
    $id = $res->fetch_assoc()["COUNT(id)"];
    $values ="('" . $id . "', '" . $name ."', '" . $email."', '" . $pw."')";
    echo $values;
    $query = "SELECT * FROM user WHERE email='" .$email . "'" ;
    $res = query($query);
    if($res->num_rows > 0){
        echo "Email already exists!";
    }
    else{
        $query = "INSERT INTO user (id, name, email, password) VALUES " .$values;
        echo $query;
        $res = update($query);
    }

?>
</body>
</html>
