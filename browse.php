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
                        <h1 style="color: red">Browse</h1>
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
					if ($improvementsSource != "") {
            		foreach (explode(';', $improvementsSource) as $improvement) {

                    $improvementArr = explode(',', $improvement);
                    $userLikes = false;
                    
                    $sql = "SELECT * FROM Likes WHERE uid='" . $_SESSION['uid'] ."' AND iid='" . $improvementArr[0] . "'";
                    $result = executeSQL($conn, $sql);

                    if($result){
                      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        $userLikes = true;
                      }		
                  }

                    echo '<div class="content-section-a">

                        <div class="container">
                            <div class="row">
                                <div class="col-lg-5 col-sm-6">
                                    <div class="clearfix"></div>
                                    <a href="idea.php?iid='.$improvementArr[0].'"><h2 class="section-heading">'.$improvementArr[1].'</h2></a>
                                    <p class="lead">'.$improvementArr[2].'</p>
                                </div>
                                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                                    <h1><button class="btn btn-default btn-lg" onclick="location.href=\'backend/addLike.php?uid='. $_SESSION['uid'] .'&iid=' . $improvementArr[0] . '\'"';

                    if($userLikes) {
                        echo 'disabled';
					}

                    echo '>'.$improvementArr[4].' <i class="fa fa-heart"></i></button></h1>';
                   echo '</div>
                            </div>

                        </div>
                        <!-- /.container -->

                    </div>';
					}}
                    ?>
                                

	
	
	
                </div>
            </div>

        </div>
        <!-- /.container -->
    </div>
	
    <?php require_once('footer.php'); ?>
	
</body>
</html>