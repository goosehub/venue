<?php
//connect.php
$server = 'localhost';
$username   = 'root';
$password   = '';
$database   = 'venue';


// Create connection
$con = new mysqli("localhost","root","","venue");


// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>