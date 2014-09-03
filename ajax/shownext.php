<?php session_start();
include '../connect.php';

              echo '<img id="showPrevious" width="8%" src="banners/prev.png">';


$sql = "SELECT * 
FROM image
WHERE id>{$_SESSION['showid']}
ORDER BY id 
ASC LIMIT 1;";

if ($result = mysqli_query($con, $sql))
{
          while($row = mysqli_fetch_assoc($result)) 
          {
$_SESSION['showid'] = $row['id'];
  echo '<img src="images/'.trim($row['filename']).'" width="80%" height="80%" class="img-rounded">';

}
}

$sql = "SELECT *
              FROM image
              WHERE id = ( SELECT Max(id) FROM image ) ;";
              if ($resultShow = mysqli_query($con, $sql))
{
          while($row = mysqli_fetch_assoc($resultShow)) 
          {
            if($row['id'] != $_SESSION['showid']) {
              echo '<img id="showNext" width="8%" src="banners/next.png">';
            } else {
              echo '<img width="8%" src="banners/next.png" class="disabled">';
            }
            }
          }


?>