<?php

include '../connect.php';

     if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	header("/venue/index.php");

$link = $_POST['link'];
$title = $_POST['title'];
$link = htmlentities($link); //breaks the link
$title = htmlentities($title);
      $operationShout = "INSERT INTO shout (link, title)
                          VALUES('". $link ."', '". $title ."');";
                          
$result = mysqli_query($con, $operationShout); 

}


     	?>
