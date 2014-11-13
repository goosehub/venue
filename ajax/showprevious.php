<?php session_start();
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
              echo '<img id="showPrevious" width="8%" src="banners/prev.png" class="showButtonsPre">';
            } else {
              echo '<img width="8%" src="banners/prev.png" class="disabled showButtonsPre">';
            }
            }
          }

$sql = "SELECT * 
FROM image
WHERE id={$_SESSION['showid']};";

if ($result = mysqli_query($con, $sql))
{
          while($row = mysqli_fetch_assoc($result)) 
          {
  echo '<img src="images/'.trim($row['filename']).'" width="80%" height="80%" class="img-rounded">';
          }
}

              echo '<img id="showNext" width="8%" src="banners/next.png" class="showButtonsNext">';

?>