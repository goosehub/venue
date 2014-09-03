<?php session_start();
include '../connect.php';

      echo '<img id="watchPrevious" class="videoButtons" width="8%" src="banners/prev.png">';

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
  echo '<iframe width="80%" height="250" src="//www.youtube.com/embed/'.trim($row['watchid']).'?autoplay=1" frameborder="0" allowfullscreen></iframe>';
          }
}

$sql = "SELECT *
              FROM watch
              WHERE id = ( SELECT MAX(id) FROM watch ) ;";
              if ($result = mysqli_query($con, $sql))
{
          while($row = mysqli_fetch_assoc($result)) 
          {
            if($row['id'] != $_SESSION['watchid']) {
      echo '<img id="watchNext" class="videoButtons" width="8%" src="banners/next.png">';
            } else {
      echo '<img class="videoButtons disabled" width="8%" src="banners/next.png">';
            }
            }
          }
?>