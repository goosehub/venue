<?php session_start();
//video ajax
include '../connect.php';

echo '<div class="row">
  <div class="col-md-2 col-xs-2">
  	<button type="button" class="btn btn-default btn-default active" id="talkPrevious">
  	<font size="6"><span class="glyphicon glyphicon-arrow-left"></span></font>
  	</button>
  </div>
  <div class="col-md-8 col-xs-8">
      <span id="talkTitleContainer">';

$sql = "SELECT * 
FROM talk
WHERE id>{$_SESSION['talkid']}
ORDER BY id 
ASC LIMIT 1;";

if ($result = mysqli_query($con, $sql))
{
          while($row = mysqli_fetch_assoc($result)) 
          {
$_SESSION['talkid'] = $row['id']; 
  echo '<center><font size="5">'.$row['title'].'</font><br><font size="2">By '.$row['user'].'</font></center> ';
          }
}

echo '</span>
  </div>
  <div class="col-md-2 col-xs-2">
  <button type="button" class="btn btn-default btn-default active" id="talkNext">
  	<font size="6"><span class="glyphicon glyphicon-arrow-right"></span></font>
  	</button>
</div>
      	</div>';

?>