<?php
require_once("dbconn.php");
require_once("detect.php");

$sql = "SELECT * FROM Improvements";

$result = executeSQL($conn, $sql);

if ($browser == 'desktop') {
	$cellSize = 'width:200px;height:210px;';
	$rankArrowSize = 'width:15px;height:15px;';
}
else if ($browser == 'mobile') {
	$cellSize = 'font-size:80px;width:1000px;height:1010px;';
	$rankArrowSize = 'width:50px;height:50px;';
}
echo "<div style='max-width:1000px;margin:auto;text-align:center;'>";
while ($row = $result->fetch_array(MYSQL_ASSOC)) {
	echo $row['iid'] . " : " .  $row['name'] . " : " . $row['description'] . "<br>";
}
echo "</div>";
echo "done";

?>