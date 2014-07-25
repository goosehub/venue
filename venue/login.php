<?php
 
 //login form
function loginForm(){
    echo'
    <center>
    <br><br><br><br><br>
    <div id="loginform">
    <form action="index.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" />
        <input type="submit" name="enter" id="enter" value="Enter" />
    </form>
    <p style="font-size:40px;"><a href="/index.html">
        <span class="glyphicon glyphicon-arrow-left"></span>
        </a></p>
    </div>
    </center>
    ';
}
 

if(isset($_POST['enter'])){
    if($_POST['name'] != ""){
        $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
    }
}

//logout
/*
if(isset($_GET['logout'])){ 
    session_destroy();
    //header("Location: index.php"); //Redirect the user
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/index.html">';
}
*/
?>