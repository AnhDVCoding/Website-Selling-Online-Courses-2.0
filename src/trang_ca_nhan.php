<?php
session_start();
include '../connectdb.php';
include '../function.php';
$username = $_SESSION['username'];
$SQL = "SELECT username, password, fullname, email, gender, avatar, permission FROM information WHERE username = '$username'";
$infor = mysqli_query($connect, $SQL);
$permission = getPermission($connect, $username);
if ($_SESSION['username']) {
} else {
	header("location: DN.php");
}
?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="../css/font-awesome-4.7.0/css/font-awesome.css">
	<link rel="stylesheet" href="../css/style.php">
	<link rel="stylesheet" href="../css/style_infor.php">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Khóa học</title>
</head>

<body>
	<?php include 'header.php';   ?>
	<div id="box" class="justify-content">
	</div>
	<div id="box" class="justify-content">
		<!-- <form method='GET' action=''>
    		<input type="hidden" name="id_khoa_hoc">
    		<input type='submit' name='BtnXem' value="Vào xem">
    	</form> -->
		<div id='item-infor'>
			<?php
			$kq="";
			if (mysqli_num_rows($infor) > 0) {
				while ($row = mysqli_fetch_assoc($infor)) {
					if ($row['permission'] == 0) {
						$permission = 'Học sinh';
					} elseif ($row['permission'] == 1) {
						$permission = 'Giáo viên';
					} else {
						$permission = 'Quản trị';
					}
					if (isset($_POST['changeInfor'])) {
						header("location: TrangDoiThongTin.php");
					}
					echo "
		            		<div id='" . 'box-content' . "'>
								<div class='" . 'center' . "'>
		                			<img id='" . 'avatar' . "' src='" . $row['avatar'] . "'>
								</div><br>
		                		<p id='" . 'name' . "'>" . $row['username'] . "</p>
		                		<br>
		                		<p id='" . 'infor' . "'>Họ và tên: " . $row['fullname'] . "</p>
		                		<p id='" . 'infor' . "'>Giới tính: " . $row['gender'] . "</p>
		                		<p id='" . 'infor' . "'>Email: " . $row['email'] . "</p>
		                		<p id='" . 'infor' . "'>Vai trò: " . $permission . "</p>
								<div class='" . 'center' . "'>
									<form action='" . "#" . "' method='" . 'post' . "'>
										<input type='" . 'submit' . "' class='" . 'submit-all' . "' value='" . 'Thay đổi thông tin' . "' name=" . 'changeInfor' . ">
										<br>
									</form>
								</div>
		            		</div>
		    		";
				}
			}
			?>
		</div>
	</div>
</body>
<?php include "footer.php" ?>

</html>