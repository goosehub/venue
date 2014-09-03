<?php

$sql = "SELECT *
              FROM watch
              WHERE id = ( SELECT MAX(id) FROM watch ) ;";

if ($resultwatch = mysqli_query($con, $sql))
{
          while($row = mysqli_fetch_assoc($resultwatch)) 
          {
$_SESSION['watchid'] = $row['id'];
}
}

$sql = "SELECT *
              FROM watch
              WHERE id = ( SELECT MIN(id) FROM watch ) ;";
              if ($result = mysqli_query($con, $sql))
{
          while($row = mysqli_fetch_assoc($result)) 
          {
            if($row['id'] != $_SESSION['watchid']) {
      echo '<img id="watchPrevious" class="videoButtons" width="8%" src="banners/prev.png">';
            } else {
      echo '<img class="videoButtons disabled" width="8%" src="banners/prev.png">';
            }
            }
          }

$sql = "SELECT *
              FROM watch
              WHERE id = ( SELECT MAX(id) FROM watch ) ;";

if ($resultwatch = mysqli_query($con, $sql))
{
          while($row = mysqli_fetch_assoc($resultwatch)) 
          {
$_SESSION['watchid'] = $row['id'];
  echo '<iframe width="80%" height="250" src="//www.youtube.com/embed/'.trim($row['watchid']).'" frameborder="0" allowfullscreen></iframe>';
}
}

      echo '<img class="videoButtons disabled" width="8%" src="banners/next.png">';

?>