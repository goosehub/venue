<?php
session_start();

include '../connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
//if(isset($_SESSION['name'])) //also works
{
	header("Location: /venue/index.php");

    $message = $_POST['text'];

				$operation = "INSERT INTO
                    chat(user, message)
                VALUES('". $_SESSION['name'] ."', '". $message . "');";
				$result = mysqli_query($con, $operation); 
}  
?>