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
                        <h1 style="color:red">Manage</h1>
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
        // get current life cycle phase and move up one to display on button:
        $lcp = ucfirst(explode(',', $improvement)[3]);

        if($lcp == "Idea"){
            $lcp = "Review";
        } else if($lcp == "Review"){
            $lcp = "Submission";
        } else if($lcp == "Submission"){
            $lcp = "Decision";
        } else if($lcp == "Decision"){
            $lcp = "Implementation";
        }

    echo '<div class="content-section-a">
        <form action="backend/pushLCP.php" method="GET">
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
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">';
                if(explode(',', $improvement)[3] == "implementation"){
                    echo '<i style="color:green" class="fa fa-check"></i><span style="color:green">  Being Implemented</span> ';
                } else {
                    echo '<input type="hidden" name="lcp" value="'. lcfirst($lcp) .'">';
                    echo '<input type="hidden" name="iid" value="'. explode(',', $improvement)[0] .'">';
                    echo '<span><input type="submit" value="Push to '. $lcp .'"></span>';
                }
                echo '</div>
            </div>

        </div>
        </form>
        <!-- /.container -->

    </div>';
    $cutoff--;
        }
    ?>
	<?php require_once('footer.php'); ?>
   
</body>
</html>
