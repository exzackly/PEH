<?php
session_start();
require_once("dbconn.php");
	
$name = $_GET['name'];
$type = $_GET['type'];
$email = $_GET['email'];
$password = $_GET['pwd'];

$password = password_hash($_GET['pwd'], PASSWORD_BCRYPT);
$sql = "INSERT INTO Users (name, type, email, password) VALUES ('$name', '$type', '$email', '$password')";

executeSQL($conn, $sql);

echo "User Added";

$id = mysqli_insert_id($conn);
$_SESSION['uid'] = $id;
$_SESSION['name'] = $name;

header('Location: ../browse.php');
?>