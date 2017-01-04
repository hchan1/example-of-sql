<!DOCTYPE html>
<html lang="en">

<?php

function bcookie($name,$value)
{

setcookie($name,$value,time()+(86400*30),"/");
}
?>
<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GatorSpace</title>
    <link href="https://fonts.googleapis.com/css?family=Oswald:300" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- JS -->
    <!-- please note: The JavaScript files are loaded in the footer to speed up page construction -->
    <!-- See more here: http://stackoverflow.com/q/2105327/1114320 -->

    <!-- CSS -->
   
    <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
    <link href="<?php echo URL; ?>css/profile.css" rel="stylesheet">
    <script src="<?php echo URL; ?>js/jquery.min.js"></script>
    <script src="<?php echo URL; ?>css/bootstrap.css"></script>
    <script src="<?php echo URL; ?>css/bootstraptheme.css"></script>
    <script src="<?php echo URL; ?>js/bootstrap.min.js"></script>
    <link href="<?php echo URL; ?>css/dropzone.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.6.2/firebase.js"></script>
    <script>
    // Initialize Firebase
    var config = {
        apiKey: "AIzaSyCK7dCcIogSp8m0FTi7JlL22R8LXKHnLSg",
        authDomain: "gatorspace-4f244.firebaseapp.com",
        databaseURL: "https://gatorspace-4f244.firebaseio.com",
        storageBucket: "gatorspace-4f244.appspot.com",
        messagingSenderId: "205729933585"
    };
    firebase.initializeApp(config);
    console.log("in header:: " + "firebase initialized");

        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-88772086-1', 'auto');
        ga('send', 'pageview');
    </script>

</head>

<nav class="navbar navbar-fixed-top" id="navbar-custom">
    <div class="container">
        <button type="button" id="collapse-button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span id="hamburger1" class="icon-bar-1 icon-bar"></span>
            <span id="hamburger2" class="icon-bar-1 icon-bar"></span>
            <span id="hamburger3" class="icon-bar-1 icon-bar"></span>
        </button>

        <a class="navbar-brand" href="<?php echo URL; ?>">
            <img id="navbar-image" class = "img-responsive center-block" alt="Brand" src="<?php echo URL; ?>img/icon.png">
        </a>
        <li id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-left">
                <li>
                <form class="navbar-form" role="search" action="<?php echo URL; ?>home/search" method="GET">
                    <div class="input-group">
                        <input type="text" style="height:40px; box-shadow:0px 0 white, 0px 0 white, 0 7px 4px -3px black;" placeholder="Search by zip, city, or address" name="search" value="<?php if(isset($_GET["search"])) echo $_GET["search"]; ?>" class="form-control" id="jumbo-search-input srch-term" size="50">
                        <input type="hidden" name="type" value="<?php if (isset($_GET["type"])) echo $_GET["type"]; else echo "All";?>" />
                        <div class="input-group-btn">
                            <button type="submit" name="submit_search" id="btn-yellow" class="btn btn-warning" value="success" style="height:40px; box-shadow:0px 0 white, 0px 0 white, 0 7px 4px -3px black;">Search <span class="glyphicon glyphicon-search"></span></button>
                            <i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                </form>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo URL; ?>listing/index">Browse</a></li>
                <li>
                    <a href="<?php echo URL; ?>listing/create">Add Listing</a>
                </li>
                <?php if (isset($_SESSION['loggedIn'])): ?>
                    <li>
                        <a href="<?php echo URL; ?>profile">Dashboard</a>
                    </li>
                    <li>
                    <a href="<?php echo URL; ?>profile/logout">Log out</a>
                    </li>
                <?php elseif (false): ?>
                    <li>
                        <a href="<?php echo URL; ?>listing">Admin</a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#register-modal">
                            Register
                        </a>
                    </li>
                    <li>
                        <a href="#"  data-toggle="modal" data-target="#signin-modal">
                            Sign In
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
    </div>
    </div>
</nav>



<div class="modal fade" id="apply-listing-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">New message</h4>
            </div>
            <div class="modal-body">
                <form>
                    <p>Please enter a nice message if you want</p>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" id="apply-listing-send-btn" data-dismiss="modal" class="btn btn-primary">Apply</button>
            </div>
        </div>
    </div>
</div>

    


    
