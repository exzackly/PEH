<?php
$title = "FoxFix - Idea";
$customCSS = "browse-page.css";
require_once("header.php");
?>
<body>
    
    <div id="fb-root"></div>
    <!-- script for FB share button -->
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

</script>
    <?php
    require_once('backend/session.php');

    // Grab the improvement and comment data from the API

        $output = file_get_contents('http://www.exzackly7.com/PEH/backend/displayImprovements.php?iid='.$_GET['iid']);

        // Parses into individual improvements
		$outputArr = explode('#', $output);

        $name = $outputArr[0];
		$desc = $outputArr[1];
		$likes = $outputArr[3];
		$commentsArr = [];

        // Parses comments
		foreach (explode(';', $outputArr[4]) as $out) {
			if ($out[1] == "]") {break;} 
			$outSplit = explode(':', $out);
			$commentsArr[] = [str_replace("[","",$outSplit[0]), $outSplit[1], str_replace("]","",$outSplit[2])];
		}
        $user = $outputArr[5];
		$userLikes = false;

        // Checks if user liked idea already
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
                        <h1><?php echo $name; ?> <div class="fb-share-button" data-href="http://www.exzackly7.com/PEH/idea.php?iid=<?php echo $_GET['iid']; ?>" data-layout="button"></div></h1>
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
                <div class="col-lg-12">
                    <div class="clearfix"></div>
					<h1 class="section-heading"><?php echo $name; ?>
                    <?php
                    
                    echo '<button class="btn btn-default btn-lg" onclick="location.href=\'backend/addLike.php?uid='. $_SESSION['uid'] .'&iid=' . $_GET['iid'] . '\'"';

                    //Checks if user has already liked this idea
                    if($userLikes)
                        echo 'disabled';
                    
                    echo '><span class="network-name">Like';

                    if($userLikes)
                        echo 'd';

                    echo ' <i class="fa fa-heart fa-fw"></i>' . $likes . '</span></button>';
                    
                    ?></h1>
                    <h2 class="section-heading"><?php echo $desc; ?></h2>
                    <hr class="section-heading-spacer"><br><br>
                    <h2 class="section-heading">Comments</h2>

                    <p class="lead">
					<?php
                    // Display all comments
					foreach ($commentsArr as $usercomm) {
					echo	'<div class="col-lg-12">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                        <strong>'.$usercomm[0].'</strong> <span class="text-muted">commented on '.substr($usercomm[2], 0, 10).'</span>
                        </div>
                        <div class="panel-body">
                        '.$usercomm[1].'
                        </div><!-- /panel-body -->
                        </div><!-- /panel panel-default -->
                        </div><!-- /col-sm-5 -->';
					}
					?>
					
					</p>

                    <!-- Comment form -->
                    <div class="form-group">
                    <form action="backend/addComment.php" method="GET">
                    <label for="comment">Comment:</label>
                    <textarea class="form-control" rows="5" id="comment" name="cmt"></textarea>
                    <input type="hidden" name="uid" value="<?php echo $_SESSION['uid']; ?>">
                    <input type="hidden" name="iid" value="<?php echo $_GET['iid']; ?>">
                    <input class="btn btn-default" type="submit"></input>
                    </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>

   <?php require_once('footer.php'); ?>
   
</body>
</html>
