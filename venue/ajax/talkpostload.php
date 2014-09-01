<?php
$sql = "SELECT *
              FROM talk
              WHERE id = ( SELECT MAX(id) FROM talk ) ;";

if ($result = mysqli_query($con, $sql))
{
          while($row = mysqli_fetch_assoc($result)) 
          {

$formatPost = $row['post'];
$cleanPost = htmlentities($formatPost);
$finalPost = str_replace("\t",'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$cleanPost) ;
  echo '<left><p>'.nl2br($finalPost).'</p></left> ';
}
}
?>