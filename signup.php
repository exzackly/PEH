<?php
$title = "FoxFix - Sign Up";
$customCSS = "signup-page.css";
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
                        <h1>Signup</h1>
                        <h3>Enter your info below:
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
                <div class="col-lg-12 col-sm-6">
                    <form action="backend/addUser.php" method="GET" id="signup">
                      <fieldset class="form-group">
                        <label for="Name">Name</label>
                        <input type="name" class="form-control" name="name" id="Name" placeholder="Your name here">
                        <small class="text-muted">First name and last name.</small>
                      </fieldset>
                      <fieldset class="form-group">
                        <label for="Email">Email address</label>
                        <input type="email" class="form-control" name="email" id="Email" placeholder="Enter email">
                        <small class="text-muted">This will be your username to log in.</small>
                      </fieldset>
                      <fieldset class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control" name="pwd" id="Password" placeholder="Password">
                      </fieldset>
                      <fieldset class="form-group">
                        <label for="iAmA">I am a:</label>
                        <select class="form-control" name="type" id="iAmA">
                          <option>Student</option>
                          <option>Faculty Member</option>
                          <option>Employee</option>
                        </select>
                      </fieldset>
                      <button type="submit" form="signup" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.container -->
    </div>
    
	<?php require_once('footer.php'); ?>
	
</body>
</html>
