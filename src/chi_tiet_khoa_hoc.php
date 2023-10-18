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
	

	$id_khoa_hoc = $_GET['id_khoa_hoc'];
	$DLKhoaHoc = getDLfromKhoaHoc($connect, $id_khoa_hoc);
	if (mysqli_num_rows($DLKhoaHoc) > 0) {
        $list_DL_khoahoc = mysqli_fetch_assoc($DLKhoaHoc);
        $ten_khoa_hoc = $list_DL_khoahoc['ten_khoa_hoc'];
        $thumbnail_path = $list_DL_khoahoc['thumbnail'];
    }


	$video_type = "none";
	$ten_bai_hoc = "Khóa học ".$ten_khoa_hoc;
	if (isset($_GET['id_bai_hoc'])) {
		$id_bai_hoc = $_GET['id_bai_hoc'];
		$QueryTTBH = LayBaiHoc($connect, $id_khoa_hoc, $id_bai_hoc);
		if (mysqli_num_rows($QueryTTBH) > 0) {

	        $list_bai_hoc = mysqli_fetch_assoc($QueryTTBH);
	        $ten_bai_hoc = $list_bai_hoc['Ten_bai_hoc'];
	        $video_type = $list_bai_hoc['video_type'];
			$video_path = $list_bai_hoc['Video_path'];
			$de_bai_path = $list_bai_hoc['De_bai_path'];
		}
	}
	

	$luot_xem = countLuotXem($connect, $id_khoa_hoc);


	

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/font-awesome-4.7.0/css/font-awesome.css">
	<link rel="stylesheet" href="../css/style.php">
	<link rel="stylesheet" href="../css/chi_tiet_bai_hoc_css.php">
	

	<title></title>
</head>
<style type="text/css">
	body{
		 background: lightgray;

	}



</style>
<body>
	<?php include 'header.php'; ?>

	<div class="box1">
		<br>
		<div class="box2">
			<div id="video">
				<?php
					if ($video_type == "link") {
						echo "<iframe src='".$video_path."' width='100%' height='500px'></iframe>";
					}
					elseif ($video_type == "upload"){
						echo "
							<video width='100%' height='500px' controls>
		  						<source src='".$video_path."'>
							</video>
						";
					}
					elseif ($video_type == "none"){
						
						echo "<img src='".$thumbnail_path."' width='100%' height='100%'>";
					}
				?>
				
				
				
			</div>
			<div id="list_bai_tap">
				<div class="title">Danh sách bài học 
					<?php 
						if ($permission == 1 || $permission == 2) {
					echo "<a href='them_bai_hoc.php?id_khoa_hoc=".$id_khoa_hoc."' class='btn btn-info' id='button'>Thêm</a>";
						}
					?></div>
				<ul class="list_bai_tap_item" id="scroll">
					<?php
						$QueryListBH = ListBaiHoc($connect, $id_khoa_hoc);

						if (mysqli_num_rows($QueryListBH) > 0) {
			            	while($ListBH = mysqli_fetch_assoc($QueryListBH)) {
					    		echo "
					    			
					    			<li>
						    			<a href='chi_tiet_khoa_hoc.php?id_khoa_hoc=".$id_khoa_hoc."&id_bai_hoc=".$ListBH['ID_bai_hoc']."' id ='listBH'>
						    			
							    			".$ListBH['Ten_bai_hoc']; 
							    			if ($permission == 1 || $permission == 2) {
							    				echo "
							    				<a href='sua_bai_hoc.php?id_bai_hoc=".$ListBH['ID_bai_hoc']."' class='btn btn-info' id='button'>Sửa</a>
								  				<a href='xoa_bai_hoc.php?id_bai_hoc=".$ListBH['ID_bai_hoc']."' class='btn btn-info' id='button'>Xóa</a>	";
							    			};
							    			echo "
								    		
					    				</a>
					    			</li>
					    			
					    		";
					    	}
					    }
					?>


					
				</ul>
			</div>
		</div>
		<br>
		<hr>
		<div class="box3">
			<br>
			<h1 id="tenBaiHoc"><?php echo $ten_bai_hoc; ?><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></h1>
			
			<br>
			<iframe width="90%" height="1000px" src="<?php echo $de_bai_path ?>"></iframe>
		</div>
		<br>
		<hr>

	</div>


	

	<?php include "footer.php" ?>
</body>
	
</html>