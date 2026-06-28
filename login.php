<?php
session_start();
include 'db.php';

if(isset($_POST['login'])){

$email=$_POST['email'];
$password=$_POST['password'];

$sql="SELECT * FROM users WHERE email='$email'";
$result=mysqli_query($conn,$sql);

$user=mysqli_fetch_assoc($result);

if(password_verify($password,$user['password'])){
$_SESSION['id']=$user['id'];
header("Location: home.php");
}else{
echo "Invalid Login";
}

}
?>

<form method="post">

<input type="email" name="email" placeholder="Email"><br><br>

<input type="password" name="password" placeholder="Password"><br><br>

<input type="submit" name="login" value="Login">

</form>
