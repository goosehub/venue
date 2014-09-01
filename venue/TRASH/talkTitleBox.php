<?php session_start();
//talk rerender ajax
include 'connect.php';
//selected latest uploaded talk


echo '<div class="row">
  <div class="col-md-2 col-xs-2">
  	<button type="button" class="btn btn-default btn-default active" id="talkPrevious">
  	<font size="6"><span class="glyphicon glyphicon-arrow-left"></span></font>
  	</button>
  </div>
  <div class="col-md-8 col-xs-8">
      <span id="talkTitleContainer">';


$sqltalk = "SELECT *
              FROM talk
              WHERE id = ( SELECT MAX(id) FROM talk ) ;";

if ($resulttalk = mysqli_query($con, $sqltalk))
{
          while($row = mysqli_fetch_assoc($resulttalk)) 
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
