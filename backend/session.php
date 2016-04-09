<?php
session_start();
require_once("dbconn.php");

if ($_GET['action'] == "logout") {
   session_unset();
   header('Location: ../index.php');
   exit;
}

if (isset($_POST['login'])) {
   $email = $_POST['email'];
   $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

   /*
   $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
   $result = executeSQL($conn, $sql);

   if($result){
      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
         $_SESSION['uid'] = $row['uid'];
         $_SESSION['name'] = $row['name'];
      }
   }
   */
   $_SESSION['uid'] = 1;
   $_SESSION['name'] = "test";
   header('Location: ../index.php');
} else if(!isset($_SESSION['uid'])) {
	header('Location: /PEH/index.php?status=notLoggedIn');
}