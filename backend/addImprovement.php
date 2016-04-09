<?php
require_once("dbconn.php");

$name = $_GET['name'];
$description = $_GET['desc'];
$lifecyclePhase = $_GET['lcp'];
$uid = $_SESSION['uid'];

$sql = "INSERT INTO Improvements (name, description, lifecyclePhase) VALUES ('$name', '$description', '$lifecyclePhase')";

executeSQL($conn, $sql);

echo "Improvement Added";
?>