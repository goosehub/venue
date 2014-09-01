<?php session_start();
include '../connect.php';

$sql = "SELECT * 
FROM talk
WHERE id<{$_SESSION['talkid']}
ORDER BY id 
DESC LIMIT 1;";

if ($result = mysqli_query($con, $sql))
{
          while($row = mysqli_fetch_assoc($result)) 
          {
$_SESSION['talkid'] = $row['id'];
}
}
$sql = "SELECT * 
FROM talk
WHERE id={$_SESSION['talkid']};";

if ($result = mysqli_query($con, $sql))
{
          while($row = mysqli_fetch_assoc($result)) 
          {
  echo '<center><font size="5" class="serif">'.$row['title'].'</font><br><font size="2" class="skinny">By '.$row['user'].'</font></center> ';
          }
}

?>