<?php
$title = "FoxFix - Manage";
$customCSS = "manage-page.css";
require_once("header.php");
?>

<body>

<?php
session_start();
require('backend/session.php');
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

<div class="content-section-a">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-sm-6">
                <div class="clearfix"></div>
                <h2 class="section-heading">Top 5 Ideas for Consideration:</h2>
                <hr class="section-heading-spacer">

            </div>
        </div>
    </div>
</div>
    <!-- Page Content -->
    <?php
    $improvementsSource = file_get_contents('http://www.exzackly7.com/PEH/backend/displayImprovements.php');
    //only display top 5 ideas: 
    $cutoff = 5;
        foreach (explode(';', $improvementsSource) as $improvement) {  
        if($cutoff <= 0){
            break;
        }     
    echo '<div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <div class="clearfix"></div>
                    <a href="idea.php?iid='.explode(',', $improvement)[0].'"><h2 class="section-heading">'.explode(',', $improvement)[1].'</h2></a>
                    <p class="lead">'.explode(',', $improvement)[2].'</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <h1>'.explode(',', $improvement)[4].' <i class="fa fa-heart"></i><span><input type="submit" value="Push to '. explode(',', $improvement)[3] .'></h1>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>';
    $cutoff--;
        }
    ?>
	<?php require_once('footer.php'); ?>
   
</body>
</html>
