<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>
!CONSTRUCTION ZONE!
<?php //create $pagetitle variable
//echo $pagetitle;
?>
</title>
    <!-- bootstrap -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<!-- custom stylesheet -->
<link type="text/css" rel="stylesheet" href="venuestyle.css">
</head>
<body>
<?php
//connect
//include 'connect.php';
//prompt for username before creating page
include 'login.php';
include 'connect.php';
if(!isset($_SESSION['name'])){
    loginForm();
}
else{
  //begin page content
?>





<div class="row">
  <div class="col-md-12">
  <center>
<?php
                //Banner
//Set on timer
$today = date("His");
if ($today >= 160000 && $today <= 220000) {
    echo '<img src="/venue/banners/afternooncomedy.jpg" class="img-responsive" alt="Responsive image">';
} elseif ($today >= 040000 && $today <= 100000) {
    echo '<img src="/venue/banners/latenightstrange.jpg" class="img-responsive" alt="Responsive image">';
} elseif ($today >= 100000 && $today <= 160000) {
    echo '<img src="/venue/banners/sundaymorningcomics.jpg" class="img-responsive" alt="Responsive image">';
} else {
    echo '<img src="/venue/banners/truestories.jpg" class="img-responsive" alt="Responsive image">';
}
?>
<img src="banners/calendar.png" id="calendar" class="img-responsive" alt="Responsive image" >
</center></div></div>


    <div class="row">
      <div class="col-md-4">

								<!-- Talk -->

      <div class="white" id="talkBox">
            <div class="row">
  <div class="col-md-2 col-xs-2">
  	<button type="button" class="btn btn-default btn-default active" id="talkPrevious">
  	<font size="6"><span class="glyphicon glyphicon-arrow-left"></span></font>
  	</button>
  </div>
  <div class="col-md-8 col-xs-8">
      <span id="talkTitleContainer">
      <?php
$sqlTalk = "SELECT *
              FROM talk
              WHERE id = ( SELECT MAX(id) FROM talk ) ;";

if ($resultTalk = mysqli_query($con, $sqlTalk))
{
          while($row = mysqli_fetch_assoc($resultTalk)) 
          {
$_SESSION['talkid'] = $row['id'];
  echo '<center><font size="5">'.$row['title'].'</font><br><font size="2">By '.$row['user'].'</font></center> ';
}
}
?>
        </span>
  </div>
  <div class="col-md-2 col-xs-2">
  <button type="button" class="btn btn-default btn-default active" id="talkNext">
  	<font size="6"><span class="glyphicon glyphicon-arrow-right"></span></font>
  	</button>
</div>
      	</div>
      	<div id="talkScroll">
      	<span id="talkPostContainer">
        <?php
$sqlTalk = "SELECT *
              FROM talk
              WHERE id = ( SELECT MAX(id) FROM talk ) ;";

if ($resultTalk = mysqli_query($con, $sqlTalk))
{
          while($row = mysqli_fetch_assoc($resultTalk)) 
          {
$_SESSION['talkid'] = $row['id'];
  echo '<left><p>'.$row['post'].'</p></left> ';
}
}
?>
              	</span>
      	</div>
      	</div>
      </div>












      <div class="col-md-4" id="centerDiv"><center>

      							<!-- watch -->

<img id="watchPrevious" class="videoButtons" width="8%" src="banners/previous.gif">
<span id="watchContainer">
<?php
$sqlwatch = "SELECT *
              FROM watch
              WHERE id = ( SELECT MAX(id) FROM watch ) ;";

if ($resultwatch = mysqli_query($con, $sqlwatch))
{
          while($row = mysqli_fetch_assoc($resultwatch)) 
          {
$_SESSION['watchid'] = $row['id'];
  echo '<embed width="80%" height="250" src="//www.youtube.com/embed/'.trim($row['watchid']).'" frameborder="0" allowfullscreen></embed>';
}
}
?>
</span>
<img id="watchNext" class="videoButtons" width="8%" src="banners/next.gif">











								<!-- controls and input display-->
<div id="inputBox">
<form>
<button type="button" id="talkControl" class="btn btn-default">Talk</button>
<button type="button" id="shoutControl" class="btn btn-default">Shout</button>
<button type="button" id="watchControl" class="btn btn-default">Watch</button>
<button type="button" id="showControl" class="btn btn-default">Show</button>
<button type="button" id="shareControl" class="btn btn-default">Share</button>
<button type="button" id="leaveControl" class="btn btn-default">Leave</button>
</form>
<br>
</div>















								<!-- show and continued input extension-->
		<!-- showBox also acts as control panel -->
<div id="showBox">
<img id="showPrevious" width="8%" src="banners/previous.gif">
<span id="showContainer">
<?php
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
?>
</span>
<img id="showNext" width="8%" src="banners/next.gif">
</div>
    </center></div>









      <div class="col-md-4">
      <div class="white" id="shoutChatDiv">

      							<!-- shoutbox -->

      <div id="shoutBox">
      <div class="row">
  <div class="col-md-2 col-xs-2">
  	<button type="button" class="btn btn-default btn-default active" id="shoutPrevious">
  	<font size="6"><span class="glyphicon glyphicon-arrow-left"></span></font>
  	</button>
  </div>
  <div class="col-md-8 col-xs-8">
      <span id="shoutContainer">
      <?php
      $sqlshout = "SELECT *
              FROM shout
              WHERE id = ( SELECT MAX(id) FROM shout ) ;";

if ($resultshout = mysqli_query($con, $sqlshout))
{
          while($row = mysqli_fetch_assoc($resultshout)) 
          {
$_SESSION['shoutid'] = $row['id'];
$aLink = trim($row['link']);
  echo '<center>
  <font size="4">
  <a target="_blank" href="'.$aLink.'">
  '.$row['title'].'</a></font><a target="_blank" href="'.$aLink.'">
  <br><font size="2">'.$aLink.'</font>
  </a>
  </center>';
}
}
?>
  </span>
  </div>
  <div class="col-md-2 col-xs-2">
  <button type="button" class="btn btn-default btn-default active" id="shoutNext">
  	<font size="6"><span class="glyphicon glyphicon-arrow-right"></span></font>
  	</button>
  </div>
</div>
      	</div>













								<!-- chatroom -->
      	<form name="message" action="post/chatpost.php" method="post" enctype="multipart/form-data">
		<input name="chatInput" type="text" class="form-control" id="chatInput">
		<!-- submit button positioned off screen -->
		<input name="submitChat" type="submit" id="submitChat" value="DICK" style="position: absolute; left: -9999px">
		</form>

<div id="chatBox">
<span id="chatContainer">
Loading...
</span>
</div>
      	</div>
      </div>
    </div>








<?php 
} //no content after this bracket 
?>
<!--
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
-->
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="ajaxfileupload.js"></script>
<script type="text/javascript" src="venuescript.js"></script>

</body></html>