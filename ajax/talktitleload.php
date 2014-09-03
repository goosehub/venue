<?php
$sql = "SELECT *
              FROM talk
              WHERE id = ( SELECT MAX(id) FROM talk ) ;";

if ($result = mysqli_query($con, $sql))
{
          while($row = mysqli_fetch_assoc($result)) 
          {
$formatTitle = $row['title'];
$finalTitle = htmlentities($formatTitle);
  echo '<center><h2 class="talkTitleText">'.$finalTitle.'</h2><br><font size="2" class="skinny">By '.$row['user'].'</font></center> ';
}
}
?>