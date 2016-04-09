<?php
session_start();

if(isset($_SESSION['uid'])){
	header('Location: ../contribute.php');
} else {
	header('Location: ../index.php?status=notLoggedIn');
}