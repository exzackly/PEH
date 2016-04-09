<?php
$servername = "localhost";
// Imports $username, $password, and $dbname
require_once("dbcredentials.php");

// Takes an SQL query, and executes it on a connection
function executeSQL($conn, $sql) {
	$result = mysqli_query($conn, $sql);
	if ($result) {
		return $result;
	} else {
		die("Error: " . $sql . "<br>" . mysqli_error($conn));
	}
}

// Creates the specified database name, and users and resident_areas tables. Then populates the resident_area table
function createDBandTables($conn, $dbname) {
	//create Database if not exist
	$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
	executeSQL($conn, $sql);

	$conn->select_db($dbname);

	//create Improvements table if not exist
	$sql = "CREATE TABLE IF NOT EXISTS Improvements (
	iid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	uid INT(6) UNSIGNED NOT NULL,
	name VARCHAR(100) NOT NULL,
	description VARCHAR(300) NOT NULL,
	lifecyclePhase VARCHAR(30) NOT NULL,
	reg_date TIMESTAMP,
	FOREIGN KEY (uid) REFERENCES Users(uid)
	) ENGINE=INNODB;";
	executeSQL($conn, $sql);
	
	//create Users table if not exist
	$sql = "CREATE TABLE IF NOT EXISTS Users (
	uid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	email VARCHAR(100) NOT NULL UNIQUE,
	password VARCHAR(300) NOT NULL,
	name VARCHAR(100) NOT NULL,
	type VARCHAR(30) NOT NULL,
	reg_date TIMESTAMP
	) ENGINE=INNODB;";
	executeSQL($conn, $sql);
	
	//create Likes table if not exist
	$sql = "CREATE TABLE IF NOT EXISTS Likes (
	uid INT(6) UNSIGNED,
	iid INT(6) UNSIGNED,
	reg_date TIMESTAMP,
	PRIMARY KEY (uid, iid),
	FOREIGN KEY (uid) REFERENCES Users(uid),
	FOREIGN KEY (iid) REFERENCES Improvements(iid)
	) ENGINE=INNODB;";
	executeSQL($conn, $sql);
	
	//create Comments table if not exist
	$sql = "CREATE TABLE IF NOT EXISTS Comments (
	uid INT(6) UNSIGNED,
	iid INT(6) UNSIGNED,
	comment VARCHAR(300) NOT NULL,
	reg_date TIMESTAMP,
	PRIMARY KEY (uid, iid),
	FOREIGN KEY (uid) REFERENCES Users(uid),
	FOREIGN KEY (iid) REFERENCES Improvements(iid)
	) ENGINE=INNODB;";
	executeSQL($conn, $sql);
}

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {die("Connection failed: " . mysqli_connect_error());}

//ensure DB and Tables exist
createDBandTables($conn, $dbname);
?>