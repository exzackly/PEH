<?php
require_once("dbconn.php");

$email = $_GET['eml'];
$password = $_GET['pwd'];
   
   $sql = "SELECT * FROM Users WHERE email='$email'";
   $result = executeSQL($conn, $sql);

   $login = false;
   
   if($result){
      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		 if (password_verify($password, $row['password'])) {
         $login = $row['uid'];
		 }
      }
   }
   
echo $login ? $login : "false";
  
?>