<?php session_start();
//video ajax
include '../connect.php';

$sql = "SELECT * 
FROM shout
WHERE id<{$_SESSION['shoutid']}
ORDER BY id 
DESC LIMIT 1;";

if ($result = mysqli_query($con, $sql))
{
          while($row = mysqli_fetch_assoc($result)) 
          {
$_SESSION['shoutid'] = $row['id'];
$aLink = trim($row['link']);
	echo '<center>
	<font size="4">
	<a target="_blank" href="'.$aLink.'">
	'.trim($row['title']).'</font>
	<br><font size="2">'.trim($row['link']).'</font>
	</a>
	</center> ';
          }
}

?>