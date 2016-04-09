
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FoxFix - Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">
    

    <!-- Toasting css -->
    <link href="css/toastr.min.css" rel="stylesheet"/>

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<?php
ob_start();
session_start();
require('backend/login.php');
?>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="index.php">FoxFix</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="browse.php">Browse</a>
                    </li>
                    <li>
                        <a href="backend/checkLoggedIn.php">Contribute</a>

                    </li>

                    <?php
                    // Displays Login if no one is logged in but Logout otherwise
                    if(!isset($_SESSION['uid'])){

                    echo '<li>
                        <a data-toggle="modal" data-target=".bs-modal-sm">Login</a>
                    </li>';
                    } else {
                        echo '<li>
                        <a href="backend/logout.php">Logged in as ' . $_SESSION["name"] . '. Logout?</a>
                    </li>';

                }

                ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Header -->
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>Welcome to <span id="foxfix">FoxFix</span></h1>
                        <h3>Making Marist Great Again, One Idea at a Time</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                        <?php
                        if(!isset($_SESSION['uid'])){
                            echo '<li>
                                <a class="btn btn-default btn-lg loginsignup" data-toggle="modal" data-target=".bs-modal-sm"><i class="fa fa-sign-in fa-fw"></i> <span class="network-name">Login</span></a>
                            </li>';
                        } ?>

                            <li>
                                <a class="btn btn-default btn-lg loginsignup" href="signup.php"><i class="fa fa-plus fa-fw"></i> <span class="network-name">Sign Up</span></a>
                            </li>
                            <li>
                                <a href="browse.php" class="btn btn-default btn-lg"><i class="fa fa-search fa-fw"></i> <span class="network-name">Browse</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->

	<a  name="services"></a>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">What's Hot:<br>Top Ideas of the Week</h2>
                    <p class="lead"><a href="#">Check out</a> the highest rated ideas of the week- submitted by users like you!</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="img/light-bulb.png" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <div class="content-section-b">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">FoxFix In Action:<br>Newly Implemented Ideas</h2>
                    <p class="lead">Using information gathered by FoxFix, Marist is now rolling out some <a href="#">new improvements.</a></p>
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                    <img class="img-responsive" src="img/marist.png" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-b -->

    <div class="content-section-a">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">MCCS Hackathon:<br>The Hartford</h2>
                    <p class="lead">This semester's hackathon, sponsored by The Hartford, spawned a brand-new way to make Marist a better community: <a href="#">introducing FoxFix</a>.</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="img/thehartford.png" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

	<a  name="contact"></a>
    <div class="banner">

        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <h2>For More Marist Information:</h2>
                </div>
                <div class="col-lg-6">
                    <ul class="list-inline banner-social-buttons">
                        <li>
                            <a href="https://www.marist.edu" class="btn btn-default btn-lg"><i class="fa fa-globe fa-fw"></i> <span class="network-name">Website</span></a>
                        </li>
                        <li>
                            <a href="https://facebook.com/marist" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/Marist" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.banner -->

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#about">About</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#services">Browse</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#contact">Contact FoxFix</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; Marist College 2016. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Helper file -->
    <script src="js/helpers.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!--Toasting code-->
    <script src="js/toastr.min.js"></script>

    <script type="text/javascript">
    // Toasts user when certain actions performed:

        $(document).ready(function() {
        var status = getUrlParameter('status');
        if(status == "signup"){
            toastr.success('Signup completed successfully!', 'Success!');
        } else if(status == "additem"){
            toastr.success('Item added successfully!', 'Success!');
        } else if (status == "notLoggedIn"){
            toastr.error('You must be logged in to contribute ideas', 'Please Log In', {timeOut:700});
        }
    });
    </script>

</body>

</html>
