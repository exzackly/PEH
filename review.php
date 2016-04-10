<?php
$title = "FoxFix - Review";
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
                        <h1 style="color: red">Review</h1>
                        <h3>Discuss current ideas!</h3>
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
                <h2 class="section-heading">Ideas for Admin Review</h2>
                    <p class="lead">Endorse realizable ideas, and say why!</p>
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>   
                </div>
            </div>
        </div>
        <!-- /.container -->
    </div>
    <!-- /.content-section-a -->

    <?php
    $improvementsSource = file_get_contents('http://www.exzackly7.com/PEH/backend/displayImprovements.php');
    //only display top 5 ideas in review state: 
    $cutoff = 5;
        foreach (explode(';', $improvementsSource) as $improvement) { 
        $lcp = explode('#', $improvement)[3];
        //echo $lcp;
        if($cutoff <= 0){
            break;    
        }
        if($lcp != "review"){
            continue;
        }  
        $improvementArr = explode('#', $improvement);
                    $userLikes = false;
                    
                    $sql = "SELECT * FROM Likes WHERE uid='" . $_SESSION['uid'] ."' AND iid='" . $improvementArr[0] . "'";
                    $result = executeSQL($conn, $sql);

                    if($result){
                      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        $userLikes = true;
                    }
                }
                echo '<div class="content-section-a">
                    <form action="backend/addLike.php?uid='. $_SESSION['uid'] .'&iid=' . $improvementArr[0] . '&page=review' . 
                    ' method="GET">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 col-sm-6">
                                <div class="clearfix"></div>
                                <a href="idea.php?iid='.explode('#', $improvement)[0].'"><h2 class="section-heading">'.explode('#', $improvement)[1].'</h2></a>
                                <p class="lead">'.explode('#', $improvement)[2].'</p>
                            </div>
                            <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                                <h1>'.explode('#', $improvement)[4].' <i class="fa fa-heart"></i></h1>
                            </div>
                            <div class="col-lg-5 col-lg-offset-2 col-sm-6">';
                                echo '<br>';
                                echo '<input type="hidden" name="uid" value="'.$_SESSION['uid'].'">';
                                echo '<input type="hidden" name="iid" value="'.$improvementArr[0].'">';
                                echo '<input type="hidden" name="page" value="review">';


                                if($userLikes){
                                    echo '<span><input style="color:green" type="submit" value="Endorsed" disabled></span>';
                                } else {
                                    echo '<span><input type="submit" value="Endorse"></span>';
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