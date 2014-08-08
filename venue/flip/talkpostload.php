<?php
$sql = "SELECT *
              FROM talk
              WHERE id = ( SELECT MAX(id) FROM talk ) ;";

if ($result = mysqli_query($con, $sql))
{
          while($row = mysqli_fetch_assoc($result)) 
          {
  echo '<left><p>'.nl2br($row['post']).'</p></left> ';
}
}
?>