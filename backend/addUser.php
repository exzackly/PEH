<?php
require_once("dbconn.php");
	
$name = $_GET['name'];
$type = $_GET['type'];
$email = $_GET['email'];
$password = $_GET['pwd'];

$sql = "INSERT INTO Users (name, type, email, password) VALUES ('$name', '$type', '$email', '$password')";

executeSQL($conn, $sql);

echo "User Added";
?>