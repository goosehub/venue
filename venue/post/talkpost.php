<?php
session_start();

include '../connect.php';

     if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	header("/venue/index.php");

$title = $_POST['title'];
// $post = $_POST['post'];
$post = $_POST['post'];
$title = htmlentities($title);
$post = htmlentities($post);
      $operation = "INSERT INTO talk (title, user, post)
                          VALUES('". $title ."','". $_SESSION['name'] ."', '". $post ."');";
                          
$result = mysqli_query($con, $operation); 

}


     	?>
