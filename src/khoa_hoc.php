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

	$SQL = "SELECT id_khoa_hoc, ten_khoa_hoc, luot_xem, thumbnail FROM khoa_hoc";
	$list_khoa_hoc = mysqli_query($connect, $SQL);

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="../css/style.php">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Khóa học</title>
</head>

<body>
    <?php include 'header.php';   ?>
    <div id="box">
    	<!-- <form method='GET' action=''>
    		<input type="hidden" name="id_khoa_hoc">
    		<input type='submit' name='BtnXem' value="Vào xem">
    	</form> -->
    	<p style=""></p>
    	<?php
    		if (mysqli_num_rows($list_khoa_hoc) > 0) {
            	while($row = mysqli_fetch_assoc($list_khoa_hoc)) {
		    		// echo "
		    		// 	<div id='item'";
		    		// 	if ($row['hidden'] == 1 && $permission == 0) {
		    		// 		echo " style='display: none'";
		    		// 	}


		    			echo"<div id='item'>
		            		<a href='chi_tiet_khoa_hoc.php?id_khoa_hoc=".$row['id_khoa_hoc']."'>
		                		<img src='".$row['thumbnail']."' id = 'imgthumbnail'><br>
		                	</a>
		                		<p>".$row['ten_khoa_hoc']."</p>
		                		<br>
		                		<p style='color:gray'><i class='fa fa-eye' aria-hidden='true'></i> ".$row['luot_xem']." Lượt xem</p>
		                		<br>
		                		<a href='chi_tiet_khoa_hoc.php?id_khoa_hoc=".$row['id_khoa_hoc']."'>
		                		<p><button class='button' id='btn1'>Vào xem</button></p>
		                		</a>
		                		";
		                		if ($permission == 1 OR $permission == 2) {
		                			echo "
		                				<br>
		                				<a href='sua_khoa_hoc.php?id_khoa_hoc=".$row['id_khoa_hoc']."'>
		                					<p><button class='button' id='btn1'>Sửa</button></p>
		                				</a>";
		                		}
		            	echo "
		            		</a>
		        		</div>
		    		";
    			}
    		}
    		if ($permission == 1 OR $permission == 2) {
    			echo "
    				<div id='item'>
		            		<a href='them_khoa_hoc.php'>
		                		<img src='../images/plus-image.jpg' id = 'imgthumbnail'><br>
		                		<p>Thêm khóa học</p>
		                		<br>
		            		</a>
		        		</div>
    			";
    		}
    	?>
        
    </div>
</body>
    <?php include "footer.php" ?>
</html>