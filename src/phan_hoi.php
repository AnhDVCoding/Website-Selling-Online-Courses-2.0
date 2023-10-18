<?php
	include '../connectdb.php';
	include '../function.php';
	session_start();

if (!isset($_SESSION['fullname'])) {
		header("location: DN.php");
	}
	
	$username = $_SESSION['username'];
	$fullname = $_SESSION['fullname'];
	
	$permission = getPermission($connect, $username);
	if (!$permission == 2) {
		header("location: khoa_hoc.php");
	}
	$id_phan_hoi = $_GET['id_phan_hoi'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/font-awesome-4.7.0/css/font-awesome.css">
	<link rel="stylesheet" href="../css/style.php">
	<link rel="stylesheet" href="../css/phan_hoi_css.php">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Phản hồi</title>
</head>

<style type="text/css">
	textarea{
		height: 200px;
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
	<?php include 'header.php'?>
	<?php
		$SQL = "
				SELECT tieu_de, noi_dung
				FROM ho_tro
				WHERE id_ticket =".$id_phan_hoi;
		$Phan_hoiQuery = mysqli_query($connect, $SQL);
		if (mysqli_num_rows($Phan_hoiQuery) > 0) {
			$DLHo_tro = mysqli_fetch_assoc($Phan_hoiQuery);
			$tieu_de = $DLHo_tro['tieu_de'];
			$noi_dung = $DLHo_tro['noi_dung'];

		}
	?>
	<br>
	<div class="box1">
		<br>
		<div class="box2">
			<p>Tiêu đề: <?php echo $tieu_de ?></p>
			<br>
			<p>Nội dung: <?php echo $noi_dung ?></p>
			<br>
			<form method="POST">
				<textarea name="respond" placeholder="Nội dung phản hồi"></textarea>
				<input type="submit" class="btn btn-primary" name="send" value="Phản hồi">
				<a href="ho_tro.php" class="btn btn-primary">Trở lại</a>
			</form>
			

			<br>
		</div>

	</div>
	<?php
		$kq = "";
		if (isset($_POST['send'])) {
			if ($_POST['respond'] == "") {
				$kq .= "Vui lòng nhập phản hồi!";
			}
			else{
				$phan_hoi = $_POST['respond'];
				insertRespond($connect, $id_phan_hoi, $phan_hoi);
				setTrangThai($connect, $id_phan_hoi);
				echo "<br><div class = 'thongbao'>Đã gửi phản hồi!</div>";
				
			}
			echo $kq;
		}
	?>
	<?php include "footer.php" ?>
</body>
</html>