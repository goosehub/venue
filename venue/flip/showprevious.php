<?php session_start();
//video ajax
include '../connect.php';

$sql = "SELECT * 
FROM image
WHERE id<{$_SESSION['showid']}
ORDER BY id 
DESC LIMIT 1;";

if ($result = mysqli_query($con, $sql))
{
          while($row = mysqli_fetch_assoc($result)) 
          {
$_SESSION['showid'] = $row['id'];
  //echo $current_id;
  //echo '<br>';
  echo '<img src="images/'.trim($row['filename']).'" width="80%" height="80%" class="img-rounded">';
          }
}

?>