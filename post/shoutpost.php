<?php

include '../connect.php';

     if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	header("/venue/index.php");

$link = $_POST['link'];
$title = $_POST['title'];
$link = mysqli_real_escape_string($con, $link);
$title = mysqli_real_escape_string($con, $title);
      $operation = "INSERT INTO shout (link, title)
                          VALUES('". $link ."', '". $title ."');";
                          
$result = mysqli_query($con, $operation); 

}


     	?>
