<?php
require_once("dbconn.php");

$sql = "SELECT * FROM Improvements";

$result = executeSQL($conn, $sql);

while ($row = $result->fetch_array(MYSQL_ASSOC)) {
echo '<div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <div class="clearfix"></div>
                    <a href="idea.php?iid='.$row['iid'].'"><h2 class="section-heading">'.$row['name'].'</h2></a>
                    <p class="lead">'.$row['description'].'</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <h1>5 <i class="fa fa-heart"></i></h1>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>';
}
?>
