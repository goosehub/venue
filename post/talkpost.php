<?php
session_start();

include '../connect.php';

     if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	header("/venue/index.php");

$title = mysqli_real_escape_string($con, $_POST['title']);
$post = mysqli_real_escape_string($con, $_POST['post']);
      $operation = "INSERT INTO talk (title, user, post)
                          VALUES('". $title ."','". $_SESSION['name'] ."', '". $post ."');";

$result = mysqli_query($con, $operation); 

}


     	?>
