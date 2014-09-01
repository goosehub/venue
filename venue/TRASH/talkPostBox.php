<?php session_start();
//talk rerender ajax
include 'connect.php';
//selected latest uploaded talk


$sqltalk = "SELECT *
              FROM talk
              WHERE id = ( SELECT MAX(id) FROM talk ) ;";

if ($resulttalk = mysqli_query($con, $sqltalk))
{
          while($row = mysqli_fetch_assoc($resulttalk)) 
          {
$_SESSION['talkid'] = $row['id'];
  echo '<left><p>'.nl2br($row['post']).'</p></left> ';
}
}



?>
