<?php
require_once("dbconn.php");

$uid = $_GET['uid'];
$iid = $_GET['iid'];

$sql = "SELECT * FROM Likes WHERE uid='$uid' AND iid='$iid'";

$result = executeSQL($conn, $sql);

$userLikes = false;

if($result){
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	$userLikes = true;
  }
}

echo $userLikes ? "true" : "false";

?>