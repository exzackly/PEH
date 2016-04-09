<?php
require_once("dbconn.php");

$user = $_GET['uid'];
$improvement = $_GET['iid'];
$comment = $_GET['cmt'];


$sql = "INSERT INTO Comments (uid, iid, comment) VALUES ($user, $improvement, '$comment')";

executeSQL($conn, $sql);

echo "Comment Added";

header('Location: ../idea.php?iid='.$improvement);
?>