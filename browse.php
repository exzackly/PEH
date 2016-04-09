<?php
$title = "FoxFix - Browse";
$customCSS = "browse-page.css";
require_once("header.php");

require_once('backend/session.php');
?>

<body>

  
	<?php require_once("navigation.php"); ?>

    <!-- Header -->
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>Browse</h1>
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
                <div class="col-lg-12 col-sm-6">
                    <?php require('backend/displayAllImprovements.php'); ?>
                </div>
            </div>

        </div>
        <!-- /.container -->
    </div>
	
    <?php require_once('footer.php'); ?>
	
</body>
</html>
