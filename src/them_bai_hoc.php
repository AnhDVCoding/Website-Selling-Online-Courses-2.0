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
	$id_khoa_hoc = $_GET['id_khoa_hoc'];
	

	
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Thêm bài học</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/font-awesome-4.7.0/css/font-awesome.css">
	<link rel="stylesheet" href="../css/style.php">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="	sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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
</style>
<?php
	

?>
<body>
	<?php include 'header.php'; ?>
	<main style="min-height: 100vh; max-width: 100%;">
		<div class="d-flex justify-content-center">
		<form action="" method="POST" class="w-50" enctype="multipart/form-data">
			<br>
			<h3>Thêm bài học</h3>

			<div class="mb-3">
			  <label for="ten_bai_tap" class="form-label">Tên bài học</label>
			  <input type="text" class="form-control" id="ten_bai_tap" name="ten_bai_tap" placeholder="Nhập tên bài học">
			</div>

			<div class="mb-3">
				<label for="video" class="form-label">Chọn kiểu tải video lên (Link Youtube hoặc tải video lên)</label><br>

				<input type="radio" id="link" name="video" value="link">
				<label for="link">
					<input type="text" class="form-control" id="link" name="linkYT" placeholder="Link video Youtube"></label>
				<br>
				<input type="radio" id="upload" name="video" value="upload">
				<label for="upload">
					<input type="file" class="form-control" id="video_bai_hoc" name="video_bai_hoc"></label><br>
			</div>

			<div class="mb-3">
			  <label for="file_de_bai" class="form-label">Chọn file đề bài</label>
			  <input type="file" class="form-control" id="file_de_bai" name="file_de_bai" value="hehe">
			</div>

			<input type="submit" class="btn btn-primary" name="saveBaiTap" value="Lưu">
			<a href="chi_tiet_khoa_hoc.php?id_khoa_hoc=<?php echo $id_khoa_hoc ?>" class="btn btn-primary">Trở lại</a>

<?php
	$kq = "<br>";
	$video_path = "none";
	$SQL1 = "SELECT ID_bai_hoc FROM list_bai_hoc WHERE ID_khoa_hoc = ".$id_khoa_hoc." ORDER BY ID_bai_hoc DESC";
		$Query1 = mysqli_query($connect, $SQL1);

		if (mysqli_num_rows($Query1) > 0) {
			$DATA = mysqli_fetch_assoc($Query1);
			$id_bai_hoc_moi_nhat = $DATA['ID_bai_hoc'];
		}
		else{
			$id_bai_hoc_moi_nhat = 0;
		}
		
		
		$id_bai_hoc = $id_bai_hoc_moi_nhat + 1;

	if (isset($_POST['saveBaiTap'])) {
		if ($_POST['ten_bai_tap'] == "") {
			$kq.= "- Bạn chưa nhập tên bài tập!<br>";
			$flag1 = false;
		}
		else{
			$ten_bai_tap = $_POST['ten_bai_tap'];
			$flag1 = true;
		}

		if (isset($_POST['video'])) {
			if ($_POST['video'] == "link") {
				$video_type = "link";
				if ($_POST['linkYT'] == "") {
					// $kq.= "- Bạn chưa nhập link!<br>";
					$flag2 = true;
				}
				else{
					$txtLink = $_POST['linkYT'];
					$video_path = LinktoEmbed($txtLink);
					$flag2 = true;
					
				}

			}
			elseif ($_POST['video'] == "upload"){
				$video_type = "upload";
				$ten_file = $_FILES['video_bai_hoc']['name'];
				if ($ten_file == "") {
					$kq.= "- Hãy chọn file video bạn muốn tải lên!<br>";
					$flag2 = false;
				}
				else{
					$path = strtolower(pathinfo($ten_file, PATHINFO_EXTENSION));
					if ($path == "mp4" || $path == "webm" || $path == "ogg" ) {
						$tmp_file = $_FILES['video_bai_hoc']['tmp_name'];
						$SaveFile = move_uploaded_file($tmp_file, "../khoa_hoc/".$id_khoa_hoc."/Vid".$id_bai_hoc.".".$path);
						$flag2 = true;
						$video_path = "../khoa_hoc/".$id_khoa_hoc."/Vid".$id_bai_hoc.".".$path;
					}
					else{
						$kq.= "- Chỉ cho phép định dạng video là mp4, webm, ogg!<br>";
						$flag2 = false;
						
						
						
					}
				}
			}
			
		}
		else{
				$video_type = "none";
				$flag2 = true;
			}
			$ten_file_de_bai = $_FILES['file_de_bai']['name'];
			if ($ten_file_de_bai == "") {
				$kq.= "- Hãy chọn file đề bài bạn muốn tải lên!<br>";
				$flag3 = false;
			}
			else{
				$path = strtolower(pathinfo($ten_file_de_bai, PATHINFO_EXTENSION));
				if (!$path == "pdf") {
					$kq.= "Chỉ cho phép định dạng pdf!<br>";
					$flag3 = false;
				}
				else{
					$tmp_file = $_FILES['file_de_bai']['tmp_name'];
					$SaveFile = move_uploaded_file($tmp_file, "../khoa_hoc/".$id_khoa_hoc."/Bai".$id_bai_hoc.".".$path);
					$de_bai_path = "../khoa_hoc/".$id_khoa_hoc."/Bai".$id_bai_hoc.".".$path;
					$flag3 = true;
				}
			}

		if ($flag1 == true && $flag2 == true && $flag3 == true) {
			insertDLBaiHoc($connect, $id_khoa_hoc, $ten_bai_tap, $video_type, $video_path, $de_bai_path);
			echo "<br><div class = 'thongbao'>Thêm thành công!</div>";
		}
		else{
			echo "<div class='error'>".$kq."</div>";
		}
		
	}
?>
		</form>
		</div>
	</main>
	<?php include "footer.php" ?>
</body>

	
</html>