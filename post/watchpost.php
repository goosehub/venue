<?php

include '../connect.php';

     if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	header("/venue/index.php");

//video process
$watchid = $_POST['watchid'];
$watchid = mysqli_real_escape_string($con, $watchid);
      $operation = "INSERT INTO watch (watchid)
                          VALUES('". $watchid ."');";
                          
$result = mysqli_query($con, $operation);   
}


     	?>
