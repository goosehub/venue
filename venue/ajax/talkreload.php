<?php session_start();
include '../connect.php';

			echo '<div class="white shadow" id="talkBox">
			<div class="row">
			<span id="talkPostTitle">
			<div class="col-md-2 col-xs-2">
			<span id="talkPreviousButton">';

$sql = "SELECT *
FROM talk
WHERE id = ( SELECT MAX(id) FROM talk ) ;";

if ($resultTalk = mysqli_query($con, $sql))
{
          while($row = mysqli_fetch_assoc($resultTalk)) 
          {
$_SESSION['talkid'] = $row['id'];
}
}

$sql = "SELECT *
        FROM talk
        WHERE id = ( SELECT MIN(id) FROM talk ) ;";
        if ($result = mysqli_query($con, $sql))
{
          while($row = mysqli_fetch_assoc($result)) 
          {
            if($row['id'] != $_SESSION['talkid']) {
    echo '<button type="button" class="btn btn-default btn-default active" id="talkPrevious">
    <font size="6"><span class="glyphicon glyphicon-arrow-left"></span></font>
    </button>';
            } else {
    echo '<button type="button" class="btn btn-default btn-default active disabled">
    <font size="6"><span class="glyphicon glyphicon-arrow-left"></span></font>
    </button>';
            }
            }
          }

			echo     '</span>
			</div>
			<div class="col-md-8 col-xs-8">
			<span id="talkTitleContainer">';

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

			echo '</span>
			</div>
			<div class="col-md-2 col-xs-2">
			<span id="talkNextButton">';

$sql = "SELECT *
        FROM talk
        WHERE id = ( SELECT MAX(id) FROM talk ) ;";
        if ($result = mysqli_query($con, $sql))
{
          while($row = mysqli_fetch_assoc($result)) 
          {
            if($row['id'] != $_SESSION['talkid']) {
    echo '<button type="button" class="btn btn-default btn-default active" id="talkNext">
    <font size="6"><span class="glyphicon glyphicon-arrow-right"></span></font>
    </button>';
            } else {
    echo '<button type="button" class="btn btn-default btn-default active disabled">
    <font size="6"><span class="glyphicon glyphicon-arrow-right"></span></font>
    </button>';
            }
            }
          }

			echo    '</span>
			</div>  	</div>
			</span>
			<!-- talk post -->
			<div id="talkScroll">
			<span id="talkPostContainer">';

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

			echo     '</span>
			</div>
			<!-- talk controls -->
			<center>
			<span id="talkPostControl">
			<button type="button" id="talkControl" class="btn btn-lg active">Talk</button>
			</span>
			</center>';

?>