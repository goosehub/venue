var talkPostTitle = '<center><form action="" method="post" enctype="multipart/form-data" id="talkForm">' + '<input type="text" name="title" class="form-control" id="talkTitle" placeholder="Title" />';
var talkPostBox = '<center><br><textarea form="talkForm" name="post" class="form-control" rows="16" id="talkContent" placeholder="1000 character minimum" /></textarea>';
var talkPostControl = '<button type="button" class="btn btn-default" id="talkContribute" >Contribute</button></form></center>' + '<br><br><button type="button" class="btn btn-default nevermind">nevermind</button>';
var watchPostBox = '<img src="/venue/banners/videoid.jpg" class="img-responsive" alt="Responsive image"><br>' + '<form action="" method="post" enctype="multipart/form-data" id="watchForm">' + '<input type="text" name="watchid" /><br>' + '<input type="button" class="btn btn-default" value="Contribute" id="watchContribute"/>' + '</form>' + '<br><br><button type="button" class="btn btn-default nevermind">nevermind</button>';
var showPostBox = '<form action="" method="post" id="showForm" enctype="multipart/form-data">' + '<input type="file" class="btn btn-default" name="file" id="file"><br>' + '<input type="submit"  class="btn btn-default" value="Contribute" id="showContribute"/>' + '</form>' + '<br><br><button type="button" class="btn btn-default nevermind">nevermind</button>';
var shoutPostBox = '<form action="" method="post" enctype="multipart/form-data" id="shoutForm">' + '<div class="row"> <div class="col-md-2"></div> <div class="col-md-8">' + '<input type="text" name="title" class="form-control" id="shoutLink" placeholder="Short Description" /><br>' + '<input type="text" name="link" class="form-control" id="shoutTitle" placeholder="Share a Link, or Leave your Contanct" /><br>' + '</div><div class="col-md-2"></div> </div>' + '<input type="button" class="btn btn-default" value="Contribute" id="shoutContribute"/>' + '</form>' + '<br><br><button type="button" class="btn btn-default nevermind">nevermind</button>';
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
                $("#showBox").html(html);
            }
        });
    }

    function loadTalk()
        {
            $.ajax(
            {
                url: "talkTitleBox.php",
                cache: false,
                success: function(html)
                {
                    $("#talkPostTitle").html(html);
                }
            });
            $.ajax(
            {
                url: "talkPostBox.php",
                cache: false,
                success: function(html)
                {
                    $("#talkPostContainer").html(html);
                }
            });
            $('#talkPostControl').html('<button type="button" id="talkControl" class="btn btn-lg active">Talk</button>');
        }
        //divided by section, not function
        //talk
        //talk flip
        //flip buttons don't work after re-rendered.
        //logic
        //hide and unhide
    $("#talkPrevious").click(function()
    {
        $.ajax(
        {
            url: "flip/talktitleprevious.php",
            cache: false,
            success: function(html)
            {
                $("#talkPostTitle").html(html);
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
    $("#talkNext").click(function()
    {
        $.ajax(
        {
            url: "flip/talktitlenext.php",
            cache: false,
            success: function(html)
            {
                $("#talkPostTitle").html(html);
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
    //talk post
    $('#talkControl').click(function()
    {
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
    //shout
    //shout flip
    //flip buttons don't work after re-rendered.
    //logic
    //hide and unhide
    $("#shoutPrevious").click(function()
    {
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
    $("#shoutNext").click(function()
    {
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
        $('#showBox').html(shoutPostBox);
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
    //show
    //flip
    //flip buttons don't work after re-rendered.
    //logic
    //hide and unhide
    /*$( "#aParentSelector" ).on( "click", "#showPrevious", function() {
      // $.ajax({ ... }) etc
    });*/
    $("#showPrevious").click(function()
    {
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
    $("#showNext").click(function()
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
        $('#showBox').html(showPostBox);
        $('#showContribute').click(function()
        {
            //$.post('post/showpost.php', $('#showForm').serialize())
            var formData = new FormData($('#showForm')[0]);
            $.ajax(
            {
                url: 'post/showpost.php',
                type: 'post',
                xhr: function()
                {
                    var myXhr = $.ajaxSettings.xhr();
                    if (myXhr.upload)
                    {
                        myXhr.upload.addEventListener('progress', progressHandlingFunction, false);
                    }
                    return myXhr;
                },
                beforeSend: beforeSendHandler,
                success: completeHandler,
                error: errorHandler,
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            });
            loadShow();
        });
        $('.nevermind').click(function()
        {
            loadShow();
        });
    });
    //watch
    //watch flip
    $("#watchPrevious").click(function()
    {
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
    $("#watchNext").click(function()
    {
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
        $('#showBox').html(watchPostBox);
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
        $("#chatInput").attr("value", "");
        return false;
    });
}); //end document ready