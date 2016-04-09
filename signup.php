<?php
$title = "FoxFix - Sign Up";
$customCSS = "signup-page.css";
require_once("header.php");
?>

<body>
    <?php
    ob_start();
    session_start();
    ?>
    <?php
        // If user signed up successfully, show toast.

    ?>
   
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
