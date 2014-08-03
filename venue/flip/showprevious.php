<?php session_start();
include '../connect.php';

$sqlShowPre = "SELECT *
              FROM image
              WHERE id = ( SELECT MIN(id) FROM image ) ;";
              if ($resultShow = mysqli_query($con, $sqlShowPre))
{
          while($row = mysqli_fetch_assoc($resultShow)) 
          {
            if($row['id'] != $_SESSION['showid']) {
              echo '<img id="showPrevious" width="8%" src="banners/previous.gif">';
            }
            }
          }





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




$sqlShow = "SELECT *
              FROM image
              WHERE id = ( SELECT Max(id) FROM image ) ;";
              if ($resultShow = mysqli_query($con, $sqlShow))
{
          while($row = mysqli_fetch_assoc($resultShow)) 
          {
            if($row['id'] != $_SESSION['showid']) {
              echo '<img id="showNext" width="8%" src="banners/next.gif">';
            }
            }
          }

?>