<?php
include 'db.php';

if(isset($_POST['register'])){

$name=$_POST['name'];
$email=$_POST['email'];
$password=password_hash($_POST['password'],PASSWORD_DEFAULT);

$sql="INSERT INTO users(name,email,password)
VALUES('$name','$email','$password')";

mysqli_query($conn,$sql);

echo "Registration Successful";
}
?>

<form method="post">
<input type="text" name="name" placeholder="Name"><br><br>
<input type="email" name="email" placeholder="Email"><br><br>
<input type="password" name="password" placeholder="Password"><br><br>

<input type="submit" name="register" value="Register">
</form>
