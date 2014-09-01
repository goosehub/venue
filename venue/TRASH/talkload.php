<?php

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

echo '<span id="talkPostTitle>';

$sql = "SELECT *
        FROM talk
        WHERE id = ( SELECT MIN(id) FROM talk ) ;";
        if ($result = mysqli_query($con, $sql))
{
          while($row = mysqli_fetch_assoc($result)) 
          {
            if($row['id'] != $_SESSION['talkid']) {
      
    echo '<div class="row"><div class="col-md-2 col-xs-2"><button type="button" class="btn btn-default btn-default active" id="talkPrevious">
    <font size="6"><span class="glyphicon glyphicon-arrow-left"></span></font>
    </button></div><div class="col-md-8 col-xs-8">';
            } else {
    echo '<div class="row"><div class="col-md-2 col-xs-2"><button type="button" class="btn btn-default btn-default active disabled">
    <font size="6"><span class="glyphicon glyphicon-arrow-left"></span></font>
    </button></div><div class="col-md-8 col-xs-8">';
            }
            }
          }

echo '';

$sql = "SELECT *
FROM talk
WHERE id = ( SELECT MAX(id) FROM talk ) ;";

if ($resultTalk = mysqli_query($con, $sql))
{
          while($row = mysqli_fetch_assoc($resultTalk)) 
          {
  echo '<center><font size="5">'.$row['title'].'</font><br><font size="2">By '.$row['user'].'</font></center> </div><div class="col-md-2 col-xs-2">';
}
}

echo '';

$sql = "SELECT *
        FROM talk
        WHERE id = ( SELECT MAX(id) FROM talk ) ;";
        if ($result = mysqli_query($con, $sql))
{
          while($row = mysqli_fetch_assoc($result)) 
          {
            if($row['id'] != $_SESSION['talkid']) {
echo  '<button type="button" class="btn btn-default btn-default active" id="talkNext">
    <font size="6"><span class="glyphicon glyphicon-arrow-right"></span></font>
    </button></div></div>';
  } else {
echo  '<button type="button" class="btn btn-default btn-default active disabled">
    <font size="6"><span class="glyphicon glyphicon-arrow-right"></span></font>
    </button></div></div>';
}
}
}
echo '</span><div id="talkScroll">
<span id="talkPostContainer">';

$sql = "SELECT *
FROM talk
WHERE id = ( SELECT MAX(id) FROM talk ) ;";

if ($resultTalk = mysqli_query($con, $sql))
{
          while($row = mysqli_fetch_assoc($resultTalk)) 
          {
  echo '<left><p>'.nl2br($row['post']).'</p></left></span>';
}
}
?>`