<?php
$title = "FoxFix - Home";
$customCSS = "landing-page.css";
require_once("header.php");
?>
<body>

<div class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <br>
        <div class="bs-example bs-example-tabs">
            <ul id="myTab" class="nav nav-tabs">
              <li class="active"><a href="#login" data-toggle="tab">Log In</a></li>
            </ul>
        </div>
      <div class="modal-body">
        <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="login">
            <form class="form-horizontal" action="backend/session.php" method="post">
            <fieldset>
            <!-- Sign In Form -->

            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="userid">Email:</label>
              <div class="controls">
                <input required="" id="email" name="email" type="text" class="form-control" placeholder="you@email.com" class="input-medium" required="">
              </div>
            </div>

            <!-- Password input-->
            <div class="control-group">
              <label class="control-label" for="password">Password:</label>
              <div class="controls">
                <input required="" id="password" name="password" class="form-control" type="password" placeholder="********" class="input-medium">
              </div>
            </div>

            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="login"></label>
              <div class="controls">
                <button id="signin" name="login" class="btn btn-success">Sign In</button>
              </div>
            </div>
            </fieldset>
            </form>
        </div>
      <div class="modal-footer">
      <center>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </center>
      </div>
    </div>
  </div>
</div> </div> </div> </div>

<?php require_once("navigation.php"); ?>

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
                            </li>
                            <li>
                                <a class="btn btn-default btn-lg loginsignup" href="signup.php"><i class="fa fa-plus fa-fw"></i> <span class="network-name">Sign Up</span></a>
                            </li>';
						} else {
                            echo '<li>
									<a href="contribute.php" class="btn btn-default btn-lg"><i class="fa fa-plus fa-fw"></i> <span class="network-name">Contribute</span></a>
                            </li>';
						}
						?>
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

   <?php require_once('footer.php'); ?>

</body>

</html>
