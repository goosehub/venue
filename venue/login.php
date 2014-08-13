<?php
 
 //login form
function loginForm(){
    echo'
    <center>
    <br><br><br><br><br>
    <div id="loginform">
    <form action="index.php" method="post">
        <input type="text" name="name" id="name" />
        <input type="submit" name="enter" id="enter" value="Enter Name" />
    </form>
    <br><br>
    <button type="button" id="leaveControl" class="btn btn-default active shadow">Leave</button>
    </div>
    </center>
    ';
}

if(isset($_POST['enter'])){
    if($_POST['name'] != ""){
        $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
    }
}

?>