<?php session_start();
//show rerender ajax
include 'connect.php';
//selected latest uploaded image
	//table is called image because show is a reserved word
echo '<img id="showPrevious" width="8%" src="banners/previous.gif">
<span id="showContainer">';
$sqlShow = "SELECT *
              FROM image
              WHERE id = ( SELECT MAX(id) FROM image ) ;";

if ($resultShow = mysqli_query($con, $sqlShow))
{
          while($row = mysqli_fetch_assoc($resultShow)) 
          {
$_SESSION['showid'] = $row['id'];
  echo '<img src="images/'.trim($row['filename']).'" width="80%" height="80%" class="img-rounded">';
}
}
echo '</span>
<img id="showNext" width="8%" src="banners/next.gif">';
?>
