<?php
session_start();
require_once("dbconn.php");

if(filter_var($_GET['email'], FILTER_VALIDATE_EMAIL) && !empty($_GET['name']) && !empty($_GET['pwd']) && !empty($_GET['type'])){
$name = $_GET['name'];
$type = $_GET['type'];
$email = $_GET['email'];
$password = $_GET['pwd'];

$password = password_hash($_GET['pwd'], PASSWORD_BCRYPT);
$sql = "INSERT INTO Users (name, type, email, password) VALUES ('$name', '$type', '$email', '$password')";

$result = executeSQL($conn, $sql);

if($result){

echo "User Added";

$id = mysqli_insert_id($conn);
$_SESSION['uid'] = $id;
$_SESSION['name'] = $name;

header('Location: ../browse.php');
} else{
	header('Location: ../signup.php?status=invalidSignup');
}
} else{
	header('Location: ../signup.php?status=invalidSignup');
}
?>