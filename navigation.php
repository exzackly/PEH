<?php
session_start();
echo '
<nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
	<div class="container topnav">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand topnav" href="index.php">FoxFix</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>
					<a href="browse.php">Browse</a>
				</li>
				<li>
					<a href="contribute.php">Contribute</a>

				</li>';
				// Checks for admin privileges
				if(isset($_SESSION['type'])){
					echo '
					<li>
					<a href="manage.php">Manage</a>
					</li>
					';
					echo '
					<li>
					<a href="backend/reviewAuth.php">Review</a>
					</li>
					';
				}
				// Displays Login if no one is logged in but Logout otherwise
				if(!isset($_SESSION['uid'])){
					echo '<li>
						<a data-toggle="modal" data-target=".bs-modal-sm">Login</a>
					</li>';
				} else {
					echo '<li>
					<a href="backend/session.php?action=logout">Logged in as ' . $_SESSION["name"] . '. Logout?</a>
				</li>';

			}
		echo '
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container -->
</nav>
';
?>