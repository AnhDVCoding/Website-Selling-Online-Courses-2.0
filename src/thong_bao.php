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

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/font-awesome-4.7.0/css/font-awesome.css">
	<link rel="stylesheet" href="../css/style.php">
	<link rel="stylesheet" href="../css/thong_bao_css.php">
	
	<title>Thông báo</title>
</head>
<body>
	<?php include 'header.php'?>
	<div class="box1">
		<h1>THÔNG BÁO</h1>
		<div class="box2">
			<?php
				$SQL = "
						SELECT HT.tieu_de, RS.noi_dung 
						FROM ho_tro AS HT JOIN respond as RS
						ON HT.id_ticket = RS.id_ticket
						WHERE HT.username ="."'".$username."'";
				$QueryTB = mysqli_query($connect, $SQL);
				if (mysqli_num_rows($QueryTB) > 0) {
	            	while($Data = mysqli_fetch_assoc($QueryTB)) {
	            		$tieu_de = $Data['tieu_de'];
	            		$noi_dung = $Data['noi_dung'];
			    		echo "
			    			<div class='box3'>
								<div class='content'>
								<p>Tiêu đề: ".$tieu_de."</p>
								<p>Phản hồi: ".$noi_dung."</p>
								</div>
							</div>
							<br>
			    		";
			    	}
		    	}
		    	else{
		    		echo "
			    			<div class='box3'>
								<div class='content'>
								<p>Bạn không có thông báo</p>
								</div>
							</div>
							<br>
			    		";
		    	}
			?>
		</div>
	</div>
	<?php include "footer.php" ?>

</body>
</html>