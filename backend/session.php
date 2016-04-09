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
   
   $sql = "SELECT * FROM Users WHERE email='$email'";
   $result = executeSQL($conn, $sql);

   if($result){
      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		 if (password_verify($_POST['password'], $row['password'])) {
         $_SESSION['uid'] = $row['uid'];
         $_SESSION['name'] = $row['name'];
         if ($row['type'] == "Admin") {
            $_SESSION['type'] = $row['type'];
         }
		 }
      }
   }
   header('Location: ../index.php');
} else if(!isset($_SESSION['uid'])) {
	header('Location: /PEH/index.php?status=notLoggedIn');
}