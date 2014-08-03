<?php session_start();
//video ajax
include '../connect.php';

$sql = "SELECT * 
FROM talk
WHERE id>{$_SESSION['talkid']}
ORDER BY id 
ASC LIMIT 1;";

if ($result = mysqli_query($con, $sql))
{
          while($row = mysqli_fetch_assoc($result)) 
          {
$_SESSION['talkid'] = $row['id']; 

  echo '<left><p>'.nl2br($row['post']).'</p></left> ';
          }
}

?>