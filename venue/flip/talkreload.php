<?php

echo '      <div class="white shadow" id="talkBox">
    <div class="row">
    <span id="talkPostTitle">
        <div class="col-md-2 col-xs-2">
    <span id="talkPreviousButton">
        <?php include 'flip/talkpreviousbuttonload.php' ?>
    </span>
    </div>
    <div class="col-md-8 col-xs-8">
    <span id="talkTitleContainer">
        <?php include 'flip/talktitleload.php' ?>
    </span>
    </div>
    <div class="col-md-2 col-xs-2">
    <span id="talkNextButton">
        <?php include 'flip/talknextbuttonload.php' ?>
    </span>
    </div>  	</div>
        </span>
                <!-- talk post -->
      	<div id="talkScroll">
      	<span id="talkPostContainer">
        <?php include 'flip/talkpostload.php' ?>
              	</span>
      	</div>
            <!-- talk controls -->
        <center>
        <span id="talkPostControl">
<button type="button" id="talkControl" class="btn btn-lg active">Talk</button>
</span>
</center>';

?>