<?php 
include '../connect.php';

$sql = "SELECT *
            from chat
            ORDER BY id DESC;";

if ($result = mysqli_query($con, $sql))
{
          while($row = mysqli_fetch_assoc($result)) 
          {
                  if (! $row['user'] == "" && ! $row['message'] == "") {
                    echo '<strong>
                    <font class="chatName">'.$row['user'].'</font>
                      </strong><br><font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      '.nl2br($row['message']).'<font><br>';
                    }
          }
}

?>