<?php
require_once("dbconn.php");

$sql = "SELECT * FROM Improvements";

$result = executeSQL($conn, $sql);

$improvements = "";
while ($row = $result->fetch_array(MYSQL_ASSOC)) {
	$improvements .= $row['iid'] . "," .  $row['name'] . "," . $row['description'] . "," . $row['lifecyclePhase'] . ";";
}
echo substr($improvements, 0, -1);
?>