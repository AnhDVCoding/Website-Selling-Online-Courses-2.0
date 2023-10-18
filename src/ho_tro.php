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

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/font-awesome-4.7.0/css/font-awesome.css">
	<link rel="stylesheet" href="../css/style.php">
	<link rel="stylesheet" href="../css/ho_tro_css.php">
	<title></title>
</head>
<body>
	<?php include 'header.php'?>
	<div class="box1">
		<br>
		<div class="box2">
			<div class="box3" style="overflow-x:auto;">
				<table id="users">
  					<tr>
					    <th width="5%">STT</th>
					    <th width="15%">Username</th>
					    <th>Tiêu đề</th>
					    <th>Nội dung</th>
					    <th width="15%">Trạng thái</th>
					    <th>_</th>
					</tr>
					<div class="list_user_item" id="scroll">
						<?php
							$SQL = "
									SELECT id_ticket, username, tieu_de, noi_dung, trang_thai
									FROM ho_tro";
							$Ho_troQuery = mysqli_query($connect, $SQL);
							if (mysqli_num_rows($Ho_troQuery) > 0) {
								$STT = 0;
				            	while($list_ho_tro = mysqli_fetch_assoc($Ho_troQuery)) {
				            		$STT += 1;
				            		$HT_id_phan_hoi = $list_ho_tro['id_ticket'];
				            		$HT_username = $list_ho_tro['username'];
				            		$HT_tieu_de = $list_ho_tro['tieu_de'];
				            		$HT_noi_dung = $list_ho_tro['noi_dung'];
				            		$HT_trang_thai = $list_ho_tro['trang_thai'];
						    		echo "
						    			<tr>
						    				<td>".$STT."</td>
						    				<td>".$HT_username."</td>
						    				<td>".$HT_tieu_de."</td>
						    				<td>".$HT_noi_dung."</td>";
						    				if ($HT_trang_thai == 0) {
						    					echo "<td>Chưa phản hồi</td>";
						    				}
						    				else{
						    					echo "<td>Đã phản hồi</td>";
						    				}
						    		echo "
						    				<td><a href='phan_hoi.php?id_phan_hoi=".$HT_id_phan_hoi."'>Phản hồi</a></td>

						    			</tr>";
						    	}
						    }
							
						?>
					</div>
				</table>
			</div>
		</div>


	<?php include "footer.php"?>
</body>
</html>