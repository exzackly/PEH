<?php
require_once("dbconn.php");

$user = $_GET['uid'];
$improvement = $_GET['iid'];

$sql = "INSERT INTO Likes (uid, iid) VALUES ($user, $improvement)";

executeSQL($conn, $sql);

echo "Like Added";

header('Location: ../idea.php?iid='.$improvement);
?>