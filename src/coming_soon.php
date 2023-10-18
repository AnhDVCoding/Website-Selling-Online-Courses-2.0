<?php
session_start();
include '../connectdb.php';
include '../function.php';
$username = $_SESSION['username'];
$SQL = "SELECT username, password, fullname, email, gender, avatar, permission FROM information WHERE username = '$username'";
$infor = mysqli_query($connect, $SQL);
$SQL1 = "SELECT username, noi_dung FROM list_cau_hoi";
$cauhoi = mysqli_query($connect, $SQL1);
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
	<link rel="stylesheet" href="../css/hoi_dap_css.php">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Khóa học</title>
</head>

<body>
	<?php include 'header.php';   ?>
	<div id="box" class="justify-content">
		<div id="item-box">
			<div id="item-box-header">Hỏi Đáp</div>
			<div id="item-hoi-dap">
				<?php
				if(isset($_GET['Dang'])){
					$cau_hoi = $_GET['cau_hoi'];
				}
				if (mysqli_num_rows($infor) > 0) {
					while ($row = mysqli_fetch_assoc($infor)) {
				?>

				<div id="dat-cau-hoi">
					<div id="dat-cau-hoi-left">
						<?php
							echo "<img id='" . 'avatar' . "' src='" . $row['avatar'] . "'>"
						?>
						<div>
							<?php
								echo $row['username']
							?>
						</div>
					</div>
					<div id="dat-cau-hoi-right">
						<form action="" method="get">
							<div id="form-dang">
								<textarea name="cau_hoi" id="" cols="30" rows="2"></textarea>
								<input type="submit" name="Dang" value="Đăng">
							</div>
						</form>
					</div>
				</div>

				<hr>

				<div id="list-cau-hoi">
					<div id="cau-hoi">
						<div id="dat-cau-hoi-left">
							<?php
								echo "<img id='" . 'avatar' . "' src='" . $row['avatar'] . "'>"
							?>
							<div>
								<?php
									echo $row['username'];
								?>
							</div>
						</div>
						<?php
							}
						}
						?>
						<?php
						if (mysqli_num_rows($cauhoi) > 0) {
							while ($row = mysqli_fetch_assoc($cauhoi)) {
						?>
						<div id="cau-hoi-right">
							<div id="noi-dung-cau-hoi">
								<?php
									echo $row['noi_dung'];
								?>
							</div>
						</div>
					</div>
				</div>
				<?php
					}
				}
				?>
			</div>
		</div>
	</div>
</body>
<?php include "footer.php" ?>

</html>