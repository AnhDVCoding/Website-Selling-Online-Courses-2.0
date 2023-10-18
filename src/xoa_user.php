<?php
	include '../connectdb.php';
	include '../function.php';


	session_start();

	if (!isset($_SESSION['fullname'])) {
		header("location: DN.php");
	}

	$fullname = $_SESSION['fullname'];
	$username = $_SESSION['username'];
	$permission = getPermission($connect, $username);



	if ($_SESSION['permission'] != 2) {
		header("location: khoa_hoc.php");
	}
	$username_del = $_GET['username_del'];

	$SQL = "DELETE FROM information WHERE username = '"."$username_del"."'"; 
	if (!$Query = mysqli_query($connect, $SQL)) {
		echo "Lỗi SQL";
	}
	else{
		header("location: quan_li_user.php");
	}
	

?>