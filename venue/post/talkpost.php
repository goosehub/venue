<?php
session_start();

include '../connect.php';

     if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	header("/venue/index.php");

$title = $_POST['title'];
// $post = $_POST['post'];
$post = mysql_real_escape_string($_POST['post']);
$title = htmlentities($title);
$post = htmlentities($post);
      $operationTalk = "INSERT INTO talk (title, user, post)
                          VALUES('". $title ."','". $_SESSION['name'] ."', '". $post ."');";
                          
$result = mysqli_query($con, $operationTalk); 

}


     	?>
