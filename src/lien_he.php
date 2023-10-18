<?php
	include '../connectdb.php';

	session_start();
	$fullname = $_SESSION['fullname'];
	$username = $_SESSION['username'];
	$permission = $_SESSION['permission'];
	

	if (!isset($_SESSION['fullname'])) {
		header("location: DN.php");
	}



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/style.php">
	<link rel="stylesheet" type="text/css" href="../css/chi_tiet_khoa_hoc_css.php">
	<title>Liên hệ</title>
</head>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
	width: 45%;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  display: inline-block;
}

	.box1{
		width: 100%;
		border: 1px;
		margin: 0 50px;
		height: auto;
		background: white;
		box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
	}

	.box2{
		display: inline-block;
		width: auto;
		min-height: 100px;

		margin: 0 2%;
	}

	.thongbao{
		width: 100%;
		border: 1px;
		height: 50px;
		font-size: 20px;

		padding-top: 10px;
		text-align: center;
		box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
		background: lightgreen;
	}
	.error{
		width: 100%;
		border: 1px;
		height: auto;
		font-size: 20px;
		padding-left: 10px;
		padding-bottom: 20px;
/*		text-align: center;*/
		box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
		background: red;
	}
</style>
<body>

	<?php include 'header.php' ?>


	<div class="box1">

			<div class="container">
			  	<form action="" method="POST">
				    


				    <label for="title">Tiêu đề</label>
				    <input type="text"  name="title" placeholder="Tiêu đề..">
				    <br>


				    <br>

				    <label for="content">Nội dung</label>
				    <textarea id="subject" name="content" placeholder="Nội dung.." style="height:200px"></textarea>
				    <br>

				    <input type="submit" name="send" value="Gửi">
			  </form>
			  <?php
			  	$kq = "";
			  	if (isset($_POST['send'])) {
			  		if ($_POST['title'] == "") {
			  			$kq .= "- Bạn chưa nhập tiêu đề!";
			  			$flag1 = false;
			  		}
			  		else{
			  			$tieu_de = $_POST['title'];
			  			$flag1 = true;
			  		}

			  		if ($_POST['content'] == "") {
			  			$kq .= "- Bạn chưa nhập nội dung!";
			  			$flag2 = false;
			  		}
			  		else{
			  			$noi_dung = $_POST['content'];
			  			$flag2 = true;
			  		}

			  		if ($flag1 == true && $flag2 == true) {
			  			$SQL = "INSERT INTO ho_tro (username, tieu_de, noi_dung) VALUES ('".$username."', '".$tieu_de."', '".$noi_dung."')";
			  			$Query = mysqli_query($connect, $SQL);
			  			echo "<br><div class = 'thongbao'>Gửi thành công!</div>";

			  		}
			  		else{
			  			echo $kq;
			  		}
			  	}
			  ?>

	</div>
	<div class="container">
		<b>Mọi thông tin đóng góp ý kiến hoặc hỗ trợ, người dùng có thể liên hệ trực tiếp qua các kênh sau:</b>
		<br>
		<br>
		<p>Số điện thoại:</p>
		<br>
		<p>
			- 0888.689.002 (Việt Anh)
			<br>
			- 0582.303.016 (Khang An)
		</p>
		<br>
		<p>Email:</p>
		<br>
		<p>
			- AnhDV181@gmail.com (Việt Anh)
			<br>
			- KhangAn@gmail.com (Khang An)
		</p>
		<br>
		<p>Mạng xã hội</p>
		<br>
		<p>
			- <a href="fb.com/ItzVanh">fb.com/ItzVanh</a> (Việt Anh)
			<br>
			- <a href="fb.com/khang.an.37017794">fb.com/khang.an.37017794</a> (Khang An)
		</p>
	</div>

</div>
	<?php include "footer.php" ?>
</body>
</html>