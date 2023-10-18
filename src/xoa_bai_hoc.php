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
	if (!$permission == 1 OR !$permission == 2) {
		header("location: khoa_hoc.php");
	}

?>
<?php
	$id_bai_hoc = $_GET['id_bai_hoc'];

	$DLfromListBH = getDLfromlist_bai_hoc($connect, $id_bai_hoc);
	if (mysqli_num_rows($DLfromListBH) > 0) {
		$DLBH = mysqli_fetch_assoc($DLfromListBH);
		$id_khoa_hoc_LBH = $DLBH['ID_khoa_hoc'];
		$ten_bai_hoc_LBH = $DLBH['Ten_bai_hoc'];
		$video_type_LBH = $DLBH['video_type'];
		$video_path_LBH = $DLBH['Video_path'];
		$de_bai_path_LBH = $DLBH['De_bai_path'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/style.php">
	<title></title>
</head>
<style type="text/css">
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

	.box1{
		align-items: center;
		width: 100%;
		min-height: 100px;
		text-align: center;
/*		background: blue;*/
		margin: 0 auto;
		height: 500px;
		
	}

	.box2{
		box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
		width: 400px;
		min-height: 100px;
		margin: 0 auto;
/*		padding-top: 200px;*/

		background: white;
	}
</style>
<body>
	<?php include 'header.php'; ?>
	<br>
	<div class="box1">
	<div class="box2">
		<p>Bạn xác nhận muốn xóa bài tập này chứ?</p>
	<form method="POST" action="">
		<input type="submit" class="btn btn-primary" name="confirm" value="Xác nhận">
		<a href="chi_tiet_khoa_hoc.php?id_khoa_hoc=<?php echo $id_khoa_hoc_LBH ?>" class="btn btn-primary">Trở lại</a>
	</form>
	</div>
	</div>
	<?php
		if (isset($_POST['confirm'])) {
			if ($video_type_LBH == "none" || $video_type_LBH == "link") {
				unlink($de_bai_path_LBH);
			}
			else{
				unlink($video_path_LBH);
				unlink($de_bai_path_LBH);
			}
			
			
			$SQL = "DELETE FROM list_bai_hoc WHERE ID_bai_hoc =".$id_bai_hoc;
			if ($Query = mysqli_query($connect, $SQL)) {
				echo "<br><div class = 'thongbao'>Xóa thành công!</div>";
				header("location: chi_tiet_khoa_hoc.php?id_khoa_hoc=".$id_khoa_hoc_LBH);

			}
			
		}
		

		
		

		
	?>
	<?php include "footer.php" ?>
</body>
</html>