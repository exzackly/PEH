<?php
session_start();
require_once("dbconn.php");

$name = $_GET['name'];
$description = $_GET['desc'];
$lifecyclePhase = $_GET['lcp'];
$uid = $_SESSION['uid'];

$sql = "INSERT INTO Improvements (uid, name, description, lifecyclePhase) VALUES ($uid, '$name', '$description', '$lifecyclePhase')";

executeSQL($conn, $sql);

$id = mysqli_insert_id($conn);

echo "Improvement Added";

header('Location: ../idea.php?iid=' . $id);
?>