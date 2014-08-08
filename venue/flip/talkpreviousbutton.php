<?php session_start();
include '../connect.php';

// previous button does not set the session talk id. Because of many moving parts, that job is moved towards the title, and the previous button is loaded after the title.

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
          ?>