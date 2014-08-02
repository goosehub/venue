<?php

include '../connect.php';

     if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	header("/venue/index.php");

//video process
$watchid = $_POST['watchid'];
$watchid = htmlentities($watchid);
//update
      $operationVideo = "INSERT INTO watch (watchid)
                          VALUES('". $watchid ."');";
                          
$result = mysqli_query($con, $operationVideo);   
}


     	?>
