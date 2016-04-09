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
                    <?php					
					
					$improvementsSource = file_get_contents('http://www.exzackly7.com/PEH/backend/displayImprovements.php');
					
		foreach (explode(';', $improvementsSource) as $improvement) {		
    echo '<div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <div class="clearfix"></div>
                    <a href="idea.php?iid='.explode(',', $improvement)[0].'"><h2 class="section-heading">'.explode(',', $improvement)[1].'</h2></a>
                    <p class="lead">'.explode(',', $improvement)[2].'</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <h1>'.explode(',', $improvement)[4].' <i class="fa fa-heart"></i></h1>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>';
		}
	
					?>
	
	
	
                </div>
            </div>

        </div>
        <!-- /.container -->
    </div>
	
    <?php require_once('footer.php'); ?>
	
</body>
</html>
