<?php
require_once("dbconn.php");

$iid = $_GET['iid'];

$comments = "";
$sql = "SELECT * FROM Comments INNER JOIN Users ON Users.uid = Comments.uid WHERE Comments.iid = $iid";
$result = executeSQL($conn, $sql);
while ($row = $result->fetch_array(MYSQL_ASSOC)) {
	$comments .= $row['name'] . "," . $row['comment'] . ";";
}

$sql = "SELECT *, COUNT(Likes.iid) as likeCount FROM Improvements INNER JOIN Likes ON Improvements.iid = Likes.iid WHERE Improvements.iid = $iid";

$result = executeSQL($conn, $sql);

while ($row = $result->fetch_array(MYSQL_ASSOC)) {
	echo $row['iid'] . "," .  $row['name'] . "," . $row['description'] . "," . $row['lifecyclePhase'] . "," . $row['likeCount'] . ",[" . substr($comments, 0, -1) . "]";
}
?>