<?php
	include '../connectdb.php';
	include '../function.php';

	session_start();
	$fullname = $_SESSION['fullname'];
	$username = $_SESSION['username'];
	$permission = getPermission($username);
?>