<?php
require_once("dbconn.php");
   



$msg = '';

if (isset($_POST['login'])) {

   $email = $_POST['email'];
   $password = $_POST['password'];

   $sql = "SELECT uid FROM users WHERE email='$email' AND password='$password'";

   if(executeSQL($conn, $sql)){

      $_SESSION['valid'] = true;
      $_SESSION['timeout'] = time();
      $_SESSION['username'] = $email;   


      echo "success";
   };

}
         