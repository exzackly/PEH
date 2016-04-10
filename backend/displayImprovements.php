<?php
require_once("dbconn.php");

if (isset($_GET['iid'])) {
	$iid = $_GET['iid'];

	$comments = "";
	$sql = "SELECT * FROM Comments INNER JOIN Users ON Users.uid = Comments.uid WHERE Comments.iid = $iid ORDER BY Comments.reg_date DESC";
	$result = executeSQL($conn, $sql);
	while ($row = $result->fetch_array(MYSQL_ASSOC)) {
		$comments .= $row['name'] . ":" . $row['comment'] . ":" . $row['reg_date'] . ";";
	}

	$sql = "SELECT *, COUNT(Likes.iid) as likeCount, Improvements.name as name, Users.name as user FROM Improvements
			LEFT JOIN Likes ON Improvements.iid = Likes.iid 
			LEFT JOIN Users ON Improvements.uid = Users.uid
				WHERE Improvements.iid = $iid";

	$result = executeSQL($conn, $sql);

	while ($row = $result->fetch_array(MYSQL_ASSOC)) {
		echo $row['name'] . "#" . $row['description'] . "#" . $row['lifecyclePhase'] . "#" . $row['likeCount'] . "#[" . substr($comments, 0, -1) . "]#" . $row['user'];
	}
} else {
	$sql = "SELECT *, COUNT(Likes.iid) as likeCount, Improvements.name as name, Users.name as user, Improvements.iid as iid FROM Improvements 
			LEFT JOIN Likes ON Improvements.iid = Likes.iid
			INNER JOIN Users ON Improvements.uid = Users.uid 
				GROUP BY Improvements.name ORDER BY likeCount DESC";

	$result = executeSQL($conn, $sql);

	$improvements = "";
		while ($row = $result->fetch_array(MYSQL_ASSOC)) {
			$improvements .= $row['iid'] . "#" . $row['name'] . "#" . $row['description'] . "#" . $row['lifecyclePhase'] . "#" . $row['likeCount'] . "#" . $row['user'] . ";";
		}
	echo substr($improvements, 0, -1);
}

?>