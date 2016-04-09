<?php
require_once("dbconn.php");

$iid = $_GET['iid'];
$lcp = $_GET['lcp'];

$sql = "UPDATE Improvements SET lifecyclePhase='$lcp' WHERE iid = $iid";
$result = executeSQL($conn, $sql);

header('Location: ../manage.php');
?>