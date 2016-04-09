<?php
$title = "FoxFix - Contribute";
$customCSS = "addIdea-page.css";
require_once("header.php");
?>
<body>

<?php
ob_start();
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
                        <h1>Contribute</h1>
                        <h3>Give us your ideas!
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
                    <form action="backend/addImprovement.php" method="GET" id="addImprovement">
                      <fieldset class="form-group">
                        <label for="Name">Title</label>
                        <input type="name" class="form-control" name="name" id="Name" placeholder="Title of your idea">
                      </fieldset>
                      <fieldset class="form-group">
                      <label for="Description">Idea</label>
                        <textarea class="form-control" name="desc" id="Description" rows="3" placeholder="Show us your vision!"></textarea>
                         <small class="text-muted">Tell us what you want to see.</small>

                      </fieldset>
                      <input type="hidden" name="lcp" value="idea"></input>
                        <button type="submit" form="addImprovement" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.container -->
    </div>
    
	<?php require_once('footer.php'); ?>
	
</body>
</html>
