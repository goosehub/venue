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

$sql = "SELECT *
        FROM talk
        WHERE id = ( SELECT MIN(id) FROM talk ) ;";
        if ($result = mysqli_query($con, $sql))
{
          while($row = mysqli_fetch_assoc($result)) 
          {
            if($row['id'] != $_SESSION['talkid']) {
    echo '<button type="button" class="btn btn-default btn-default " id="talkPrevious">
    <font size="6"><span class="glyphicon glyphicon-arrow-left"></span></font>
    </button>';
            } else {
    echo '<button type="button" class="btn btn-default btn-default  disabled">
    <font size="6"><span class="glyphicon glyphicon-arrow-left"></span></font>
    </button>';
            }
            }
          }
          ?>