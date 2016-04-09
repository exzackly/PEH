<?php
session_start();
require_once("dbconn.php");

$name = $_GET['name'];
$description = str_replace("'","\'",$_GET['desc']);
$lifecyclePhase = $_GET['lcp'];
if (isset($_SESSION['uid'])) {
	$uid = $_SESSION['uid'];
} else {
	$uid = 1;
}

$sql = "INSERT INTO Improvements (uid, name, description, lifecyclePhase) VALUES ($uid, '$name', '$description', '$lifecyclePhase')";

executeSQL($conn, $sql);

$id = mysqli_insert_id($conn);

echo "Improvement Added";

header('Location: ../idea.php?iid=' . $id);
?>