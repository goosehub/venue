<?php session_start();
include 'connect.php';

$sql = "SELECT *
              FROM image
              WHERE id = ( SELECT MAX(id) FROM image ) ;";

if ($result = mysqli_query($con, $sql))
{
          while($row = mysqli_fetch_assoc($result)) 
          {
$_SESSION['showid'] = $row['id'];
}
}

$sql = "SELECT *
              FROM image
              WHERE id = ( SELECT MIN(id) FROM image ) ;";
              if ($result = mysqli_query($con, $sql))
{
          while($row = mysqli_fetch_assoc($result)) 
          {
            if($row['id'] != $_SESSION['showid']) {
              echo '<img id="showPrevious" width="8%" src="banners/prev.png">';
            } else {
              echo '<img width="8%" src="banners/prev.png" class="disabled">';
            }
            }
          }


$sql = "SELECT *
              FROM image
              WHERE id = ( SELECT MAX(id) FROM image ) ;";

if ($result = mysqli_query($con, $sql))
{
          while($row = mysqli_fetch_assoc($result)) 
          {
  echo '<img src="images/'.trim($row['filename']).'" width="80%" height="80%" class="img-rounded">';
}
}

              echo '<img width="8%" src="banners/next.png" class="disabled">';
?>
