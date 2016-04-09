
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FoxFix - Browse</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/browse-page.css" rel="stylesheet">

    <!--Toast Library-->

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

        // Open the file using the HTTP headers set above
        $output = file_get_contents('http://www.exzackly7.com/PEH/displayImprovement.php?iid='.$_GET['iid']);
        echo $output;

        $outputArr = explode(',', $output);

        $name = $outputArr[0];



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
                        <a href="contribute.php">Contribute</a>
                    </li>
                    <?php
                    // Displays Login if no one is logged in but Logout otherwise
                    if(!isset($_SESSION['username'])){

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
                        <h1><?php echo $name; ?></h1>
                        <h3>See current ideas!</h3>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->
    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <div class="clearfix"></div>
                    <h2 class="section-heading"><?php echo $name; ?></h2>
                    <p class="lead"></p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>

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
                            <a href="#about">Signup</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#services">Login</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; Git Gud 2014. All Rights Reserved</p>
                </div>
            </div>
        </div>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
        <!-- JS helper functions -->
    <script src="js/helpers.js"></script>
</body>
</html>
