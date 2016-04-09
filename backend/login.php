<?php
require_once("dbconn.php");
   

$msg = '';

if(isset($_GET['loggedIn'])){
   echo '<script>toastr.error("You must be logged in to contribute ideas", "Please Log In");</script>';
}

if (isset($_POST['login'])) {

   $email = $_POST['email'];
   $password = $_POST['password'];

   $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
   $result = executeSQL($conn, $sql);

   if($result){

      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
         $_SESSION['name'] = $row['name'];
         $_SESSION['uid'] = $row['uid'];
      }

      $_SESSION['valid'] = true;
      $_SESSION['timeout'] = time();
      $_SESSION['username'] = $email; 
      $_SESSION['password'] = $password;  


      echo "success";
   }
}

echo '<div class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <br>
        <div class="bs-example bs-example-tabs">
            <ul id="myTab" class="nav nav-tabs">
              <li class="active"><a href="#login" data-toggle="tab">Log In</a></li>
            </ul>
        </div>
      <div class="modal-body">
        <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="login">
            <form class="form-horizontal" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" method="post">
            <fieldset>
            <!-- Sign In Form -->

            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="userid">Email:</label>
              <div class="controls">
                <input required="" id="email" name="email" type="text" class="form-control" placeholder="you@email.com" class="input-medium" required="">
              </div>
            </div>

            <!-- Password input-->
            <div class="control-group">
              <label class="control-label" for="password">Password:</label>
              <div class="controls">
                <input required="" id="password" name="password" class="form-control" type="password" placeholder="********" class="input-medium">
              </div>
            </div>

            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="login"></label>
              <div class="controls">
                <button id="signin" name="login" class="btn btn-success">Sign In</button>
              </div>
            </div>
            </fieldset>
            </form>
        </div>
      <div class="modal-footer">
      <center>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </center>
      </div>
    </div>
  </div>
</div> </div> </div> </div>';


         