var talkPostTitle = '<center><form action="" method="post" enctype="multipart/form-data" id="talkForm">' + 
'<input type="text" name="title" class="form-control" id="talkTitle" placeholder="Title" />';

var talkPostBox = 
'<center><br><textarea form="talkForm" name="post" class="form-control" rows="16" id="talkContent" placeholder="1000 character minimum" /></textarea>';

var talkPostControl = '<br><button type="button" class="btn btn-lg active" id="talkContribute" >Contribute</button></form></center>' + 
'<button class="disabled"></button> <button type="button" class="btn btn-lg active nevermind">nevermind</button>';

var watchPostBox =  '<img src="/venue/banners/videoid.jpg" class="img-responsive" alt="Responsive image"><br>' + 
'<form action="" method="post" enctype="multipart/form-data" id="watchForm">' + 
'<br><input type="text" name="watchid" /><br>' + 
'<input type="button" class="btn btn-default" value="Contribute" id="watchContribute"/>' + 
'</form>' + 
'<br><br><button type="button" class="btn btn-default nevermind">nevermind</button>';

var showPostBox = '<form action="post/showpost.php" method="post" id="showForm" enctype="multipart/form-data">' +
'<input type="file" class="btn btn-default" name="file" id="file"><br>' +
'<input type="submit"  class="btn btn-default" value="Contribute" id="showContribute"/>' +
'</form>' + 
'<br><br><button type="button" class="btn btn-default nevermind">nevermind</button>';

var shoutPostBox = '<form action="" method="post" enctype="multipart/form-data" id="shoutForm">' + 
'<div class="row"> <div class="col-md-2"></div> <div class="col-md-8">' +
'<input type="text" name="title" class="form-control" id="shoutLink" placeholder="Short Description" /><br>' + 
'<input type="text" name="link" class="form-control" id="shoutTitle" placeholder="Share a Link, or Leave your Contanct" /><br>' + 
'</div><div class="col-md-2"></div> </div>' + 
'<input type="button" class="btn btn-default" value="Contribute" id="shoutContribute"/>' + 
'</form>' + 
'<br><br><button type="button" class="btn btn-default nevermind">nevermind</button>';

var scheduleFoundation = '<div id="scheduleOverlap"><div id="scheduleDisplay">' + 
'</div></div>';

var scheduleDisplay = '<img src="banners/august.jpg" class="img-responsive" alt="Responsive image">' + 
'<button type="button" id="scheduleReturn" class="btn btn-lg active shadow">Return</button>';

$(document).ready(function()
{
    //for re-rendering after input take over
    function loadShow()
    {
        $.ajax(
        {
            url: "showbox.php",
            cache: false,
            success: function(html)
            {
                $("#showContainer").html(html);
            }
        });
    }

    function loadTalk()
        {
            $.ajax(
            {
                url: "flip/talkreload.php",
                cache: false,
                success: function(html)
                {
                    $("#talkReload").html(html);
                }
            });
        }




                //divided by section, not function





//talk
        //talk flip
    $(document).on("click","#talkPrevious", function()    {

        $.ajax(
        {
            url: "flip/talktitleprevious.php",
            cache: false,
            success: function(html)
            {
                $("#talkTitleContainer").html(html);
            }
        });
        $.ajax(
        {
            url: "flip/talkpreviousbutton.php",
            cache: false,
            success: function(html)
            {
                $("#talkPreviousButton").html(html);
            }
        });
        $.ajax(
        {
            url: "flip/talknextbutton.php",
            cache: false,
            success: function(html)
            {
                $("#talkNextButton").html(html);
            }
        });
        $.ajax(
        {
            url: "flip/talkpostprevious.php",
            cache: false,
            success: function(html)
            {
                $("#talkPostContainer").html(html);
            }
        });
    });
    $(document).on("click","#talkNext", function()    
    {
        $.ajax(
        {
            url: "flip/talktitlenext.php",
            cache: false,
            success: function(html)
            {
                $("#talkTitleContainer").html(html);
            }
        });
        $.ajax(
        {
            url: "flip/talkpreviousbutton.php",
            cache: false,
            success: function(html)
            {
                $("#talkPreviousButton").html(html);
            }
        });
                $.ajax(
        {
            url: "flip/talknextbutton.php",
            cache: false,
            success: function(html)
            {
                $("#talkNextButton").html(html);
            }
        });
        $.ajax(
        {
            url: "flip/talkpostnext.php",
            cache: false,
            success: function(html)
            {
                $("#talkPostContainer").html(html);
            }
        });
    });
    //tab functional
    $(document).on("keydown","textarea", function(e)    {
    if(e.keyCode === 9) { // tab was pressed
        // get caret position/selection
        var start = this.selectionStart;
            end = this.selectionEnd;

        var $this = $(this);

        // set textarea value to: text before caret + tab + text after caret
        $this.val($this.val().substring(0, start)
                    + "\t"
                    + $this.val().substring(end));

        // put caret at right position again
        this.selectionStart = this.selectionEnd = start + 1;

        // prevent the focus lose
        return false;
    }
});
    //talk post
    $(document).on("click","#talkControl", function()    {
        $('#talkPostContainer').html(talkPostBox);
        $('#talkPostControl').html(talkPostControl);
        $('#talkPostTitle').html(talkPostTitle);
        $('#talkContribute').click(function()
        {
            $.post('post/talkpost.php', $('#talkForm').serialize());
            loadTalk();
        });
        $('.nevermind').click(function()
        {
            loadTalk();

        });
    });





//watch
    //watch flip
    $(document).on("click","#watchPrevious", function()    {
        $.ajax(
        {
            url: "flip/watchprevious.php",
            cache: false,
            success: function(html)
            {
                $("#watchContainer").html(html);
            }
        });
    });
    //nextVideo
    $(document).on("click","#watchNext", function()    {
        $.ajax(
        {
            url: "flip/watchnext.php",
            cache: false,
            success: function(html)
            {
                $("#watchContainer").html(html);
            }
        });
    });
    //wath post
    $('#watchControl').click(function()
    {
        $('#showContainer').html(watchPostBox);
        $('#watchContribute').click(function()
        {
            $.post('post/watchpost.php', $('#watchForm').serialize());
            loadShow();
        });
        $('.nevermind').click(function()
        {
            loadShow();
        });
    });


//show
    //flip
    //flip buttons don't work after re-rendered.
    //logic
    //hide and unhide
    /*$( "#aParentSelector" ).on( "click", "#showPrevious", function() {
      // $.ajax({ ... }) etc
    });*/
    $(document).on("click","#showPrevious", function()    {
        $.ajax(
        {
            url: "flip/showprevious.php",
            cache: false,
            success: function(html)
            {
                $("#showContainer").html(html);
            }
        });
    });
    //nextVideo
    $(document).on( "click", "#showNext", function()
    {
        $.ajax(
        {
            url: "flip/shownext.php",
            cache: false,
            success: function(html)
            {
                $("#showContainer").html(html);
            }
        });
    });

    //show post
    $('#showControl').click(function()
    {
        //iframe instead?
        $('#showContainer').html(showPostBox);

    $(document).on( "click", "#showContribute", function()
        {

        });
        $('.nevermind').click(function()
        {
            loadShow();
        });
    });
    




    
//shout
    //shout flip
    //flip buttons don't work after re-rendered.
    //logic
    //hide and unhide
    $(document).on("click","#shoutPrevious", function()    {
        $.ajax(
        {
            url: "flip/shoutprevious.php",
            cache: false,
            success: function(html)
            {
                $("#shoutContainer").html(html);
            }
        });
    });
    $(document).on("click","#shoutNext", function()    {
        $.ajax(
        {
            url: "flip/shoutnext.php",
            cache: false,
            success: function(html)
            {
                $("#shoutContainer").html(html);
            }
        });
    });
    //shout post
    $('#shoutControl').click(function()
    {
        $('#showContainer').html(shoutPostBox);
        $('#shoutContribute').click(function()
        {
            $.post('post/shoutpost.php', $('#shoutForm').serialize());
            loadShow();
        });
        $('.nevermind').click(function()
        {
            loadShow();
        });
    });
    




//chat
    //Load chat display
    function loadLog()
    {
        $.ajax(
        {
            url: "chatlogger.php",
            cache: false,
            success: function(html)
            {
                $("#chatBox").html(html);
                //$("#chatbox").scrollTop($("#chatbox")[0].scrollHeight);
            }
        });
    }
    setInterval(loadLog, 500); //refresh every half second 
    //chat input
    $("#submitChat").click(function()
    {
        var clientchat = $("#chatInput").val();
        $.post("post/chatpost.php",
        {
            text: clientchat
        });
         $("#chatForm :input").val("");
        return false;
    });



    $("#scheduleControl").click(function(){
        $('#scheduleParent').html(scheduleFoundation); 
        $('#scheduleDisplay').html(scheduleDisplay);
        $('#scheduleDisplay').fadeIn( 1500 );
    });



    $("#leaveControl").click(function(){
        window.location = 'leave.php';   
    });


    $(document).on("click","#scheduleReturn", function()  {
          $('#scheduleParent').html(''); 
    });


}); //end document ready