<?php session_start();
//video ajax
include '../connect.php';

$sql = "SELECT * 
FROM watch
WHERE id>{$_SESSION['watchid']}
ORDER BY id 
ASC LIMIT 1;";

if ($result = mysqli_query($con, $sql))
{
          while($row = mysqli_fetch_assoc($result)) 
          {
$_SESSION['watchid'] = $row['id'];
  //echo $current_id;
  //echo '<br>';
  echo '<embed width="80%" height="250" src="//www.youtube.com/embed/'.trim($row['watchid']).'?autoplay=1" frameborder="0" allowfullscreen></embed>';
          }
}

?>