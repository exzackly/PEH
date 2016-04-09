<?php
$title = "FoxFix - Browse";
$customCSS = "browse-page.css";
require_once("header.php");
?>
<body>
    <?php
    require_once('backend/session.php');

        $output = file_get_contents('http://www.exzackly7.com/PEH/backend/displayImprovements.php?iid='.$_GET['iid']);

		$outputArr = explode(',', $output);

        $name = $outputArr[0];
		$desc = $outputArr[1];
		$likes = $outputArr[3];
		$commentsArr = explode(';', $outputArr[4]);
        $user = $outputArr[5];
		$userLikes = false;
		
		print_r($commentsArr);
		
		$sql = "SELECT * FROM Likes WHERE uid='" . $_SESSION['uid'] ."' AND iid='" . $_GET['iid'] . "'";
		$result = executeSQL($conn, $sql);

		if($result){
		  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$userLikes = true;
		  }
		}
    ?>
    
	<?php require_once("navigation.php"); ?>

    <!-- Header -->
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1><?php echo $name; ?></h1>
                        <h3>By <?php echo $user; ?></h3>
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
                    <div class="clearfix"></div>
					<h1 class="section-heading"><?php echo $name; ?>
                    <?php
                    
                    echo '<button class="btn btn-default btn-lg" onclick="location.href=\'backend/addLike.php?uid='. $_SESSION['uid'] .'&iid=' . $_GET['iid'] . '\'"';

                    if($userLikes)
                        echo 'disabled';
                    
                    echo '><span class="network-name">Like';

                    if($userLikes)
                        echo 'd';

                    echo ' <i class="fa fa-heart fa-fw"></i>' . $likes . '</span></button>';
                    
                    ?></h1>
                    <h2 class="section-heading"><?php echo $desc; ?></h2>

                    <p class="lead"></p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>

   <?php require_once('footer.php'); ?>
   
</body>
</html>
