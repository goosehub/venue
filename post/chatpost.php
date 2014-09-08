<?php
session_start();

include '../connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
//if(isset($_SESSION['name'])) //also works
{
	header("Location: /venue/index.php");

	$name = $_SESSION['name'];
	$message = $_POST['text'];
	$message = mysqli_real_escape_string($con, $message);
			$operation = "INSERT INTO
                chat(user, message)
            VALUES('$name', '$message')"; 
			$result = mysqli_query($con, $operation);

}  
?>