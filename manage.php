<?php
    $file = file_get_contents("http://www.exzackly7.com/PEH/displayImprovement.php?iid=1");
    $file_array = explode(',', $file);
    $formatted_array = print_r($file_array);
    
?>

<?php
$title = "FoxFix - Manage";
$customCSS = "manage-page.css";
require_once("header.php");
?>

<body>

<?php
ob_start();
session_start();
require('backend/login.php');
?>
   
   <?php require_once("navigation.php"); ?>

    <!-- Header -->
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>Manage</h1>
                        <h3>Ideas being considered...</h3>
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
                    <h3>Review these top ideas:</h3>
                    <br>
                    <br>
                        <div class="list-group">
                          <a href="#" class="list-group-item active">
                            <h4 class="list-group-item-heading">Sample Text</h4>
                            <p class="list-group-item-text">This is some sample text...</p>
                          </a>
                        </div>
                    <hr class="section-heading-spacer">

                </div>
            </div>

        </div>
        <!-- /.container -->
    </div>
    <a  name="services"></a>

	<?php require_once('footer.php'); ?>
   
</body>
</html>
