<?php
session_start();
include 'db.php';

if(!isset($_SESSION['id'])){
header("Location: login.php");
}

if(isset($_POST['post'])){

$content=$_POST['content'];
$id=$_SESSION['id'];

mysqli_query($conn,"INSERT INTO posts(user_id,content)
VALUES('$id','$content')");

}

?>

<form method="post">

<textarea name="content" placeholder="What's on your mind?"></textarea><br>

<input type="submit" name="post" value="Post">

</form>

<hr>

<?php

$result=mysqli_query($conn,"SELECT users.name,posts.content,posts.created_at
FROM posts
JOIN users
ON posts.user_id=users.id
ORDER BY posts.id DESC");

while($row=mysqli_fetch_assoc($result)){

echo "<h3>".$row['name']."</h3>";
echo "<p>".$row['content']."</p>";
echo "<small>".$row['created_at']."</small><hr>";

}

?>

<a href="logout.php">Logout</a>
