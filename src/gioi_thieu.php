<?php
	include '../connectdb.php';
	include '../function.php';

	session_start();
	$fullname = $_SESSION['fullname'];
	$username = $_SESSION['username'];
	$permission = getPermission($connect, $username);
	

	if (!isset($_SESSION['fullname'])) {
		header("location: DN.php");
	}



?>
<!DOCTYPE html>
<html>
<style type="text/css">
		body{
		 background: lightgray;

	}
</style>
<head>
	<link rel="stylesheet" href="../css/font-awesome-4.7.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="../css/gioi_thieu_css.php">
	<link rel="stylesheet" type="text/css" href="../css/style.php">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Giới thiệu</title>
<body>
	<?php include 'header.php';   ?>
    <div class="main">
    <div class="user main-user1">
    	<img src="../images/avatars/anhdv181.jpg" id="image" width="100px"><br>
    	<br>
    	<div>Doãn Việt Anh</div>
    	<div>Khoa Công nghệ thông tin</div>
    	<br>
    	<div>Liên hệ</div>
    	<br>
    	<a href="https://www.facebook.com/ItzVanh"><i class="fa fa-facebook-official" aria-hidden="true" id="icon" style="color: #3f5793;"></i></a>
    	<a href="https://www.instagram.com/ItzVanh/"><i class="fa fa-instagram" aria-hidden="true" style="color: pink;" id="icon"></i></a>
    	<a href="https://twitter.com/AnhDVX"><i class="fa fa-twitter" aria-hidden="true" style="color: #1d9bf0;" id="icon"></i></i></a>
    	<a href=""><i class="fa fa-telegram" aria-hidden="true" style="color: #229fdc;" id="icon"></i></i></a>
    </div>
    <div class="user main-user2">
    	<img src="../images/avatars/an1234.jpg" id="image" width="100px"><br>
    	<br>
    	<div></i>Lê Quý Khang An</div>
    	<div>Khoa Công nghệ thông tin</div>
    	<br>
    	<div>Liên hệ</div>
    	<br>
    	<a href="https://www.facebook.com/khang.an.37017794"><i class="fa fa-facebook-official" aria-hidden="true" id="icon" style="color: #3f5793;"></i></a>
    	<a href=""><i class="fa fa-instagram" aria-hidden="true" style="color: pink;" id="icon"></i></a>
    	<a href=""><i class="fa fa-twitter" aria-hidden="true" style="color: #1d9bf0;" id="icon"></i></i></a>
    	<a href=""><i class="fa fa-telegram" aria-hidden="true" style="color: #229fdc;" id="icon"></i></i></a>
    </div>
    </div>
    <br>
	<!--------------------------------------------------------------->
	<!-- <footer class="footer">
    	<div class="footer-left">
    		<p id="title">Về chúng tôi</p>
    		<br>
    		Là sinh viên của khoa Công nghệ thông tin trường Đại học Sư Phạm Hà Nội khóa K70, trang này là bài cuối kỳ môn Công nghệ Website
    	</div>
    	<div class="footer-middle">
    		<p id="title">Đường dẫn</p>
    		<br>
    		<p><a href="TrangChu.html">Trang chủ</a></p>
    		<br>
    		<p><a href="TrangCaNhan.html">Trang cá nhân</a></p>
    		<br>
    		<p><a href="TrangGioiThieu.html">Giới thiệu</a></p>
    		<br>
    		<p><a href="TrangKhoaHoc.html">Khóa học</a></p>
    		<br>
    	</div>
    	<div class="footer-right">
    		<p id="title">Thông tin liên hệ</p>
    		<br>
    		<a href="https://www.facebook.com/ItzVanh"><i class="fa fa-facebook-official" aria-hidden="true" id="icon" style="color: #3f5793;"></i></a>
    	<a href="https://www.instagram.com/vanhhyeehau/"><i class="fa fa-instagram" aria-hidden="true" style="color: pink;" id="icon"></i></a>
    	<a href="https://twitter.com/AnhDVX"><i class="fa fa-twitter" aria-hidden="true" style="color: #1d9bf0;" id="icon"></i></i></a>
    	<a href=""><i class="fa fa-telegram" aria-hidden="true" style="color: #229fdc;" id="icon"></i></i></a>
    	</div>
	</footer> -->
	
	<br>
	<?php include "footer.php" ?>
	
</body>
</html>