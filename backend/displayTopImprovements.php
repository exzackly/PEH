<?php
require_once("dbconn.php");

$sql = "SELECT *, COUNT(Likes.iid) as likeCount FROM Improvements INNER JOIN Likes ON Improvements.iid = Likes.iid HAVING likeCount > 10";

$result = executeSQL($conn, $sql);

while ($row = $result->fetch_array(MYSQL_ASSOC)) {
    echo $row['name'] . "," . $row['description'] . "," . $row['lifecyclePhase'] . "," . $row['likeCount'] . "]";
}


?>