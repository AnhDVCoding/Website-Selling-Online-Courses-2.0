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
			$pattern = "/@gmail.com/";
			$kq = "";
			$sql = "";
			if (mysqli_num_rows($infor) > 0) {
				while ($row = mysqli_fetch_assoc($infor)) {
					$fullname = $row['fullname'];
					$username = $row['username'];
					if ($row['permission'] == 0) {
						$permission = 'Học sinh';
					} elseif ($row['permission'] == 1) {
						$permission = 'Giáo viên';
					} else {
						$permission = 'Quản trị';
					}
					if (isset($_POST['uploadFile'])) {
						$tmp_file = $_FILES['avatar']['tmp_name'];
						$name = $_FILES['avatar']['name'];
						$type = $_FILES['avatar']['type'];
						$tmp_name = $_FILES['avatar']['tmp_name'];
						$error = $_FILES['avatar']['error'];
						$size = $_FILES['avatar']['size'];
						$path = strtolower(pathinfo($name, PATHINFO_EXTENSION));
		
						$flag0 = true;
						$flag1 = true;
						
						if ($name == "") {
							$kq = "Vui lòng chọn file!<br>";
							$flag0 = false;
						}
						else{
							
							if ($path == "jpg" || $path == "jpeg" || $path == "png") {
								$flag1 = true;
							}
							else{
								$flag1 = false;
								$kq = "Chỉ cho phép định dạng jpg, jpeg, png!<br>";
							}
		
						}
						
						if ($flag0 == true && $flag1 == true) {
							$flag = move_uploaded_file($tmp_file, "../images/avatars/".$username.".".$path);
								if ($flag == true) {
									// echo "Lưu thành công!<br>";
									$sql = "UPDATE information SET avatar = '../images/avatars/".$username.".".$path."' WHERE username = '$username'";
									$flag4 = mysqli_query($connect, $sql);
									if ($flag4) {
										// echo "Thêm thành công vào CSDL";
									}else{
										// echo "Lỗi thêm vào CSDL";
									}
								}
								else{
									// echo "Lưu thất bại!";
								}
						}
					}
					if(isset($_GET['changeFullname'])){
						$fullname = $_GET['fullname'];
						if($fullname != ""){
							$sql = "UPDATE information SET fullname = '$fullname' WHERE username = '$username'";
							if (!mysqli_query($connect, $sql)) {
								echo "Thêm vào bảng thất bại!";
							}
							$kq = "Đổi tên thành công";
						}
					}
					if(isset($_GET['changeGender'])){
						$gender = $_GET['gender'];
						if($gender != ""){
							$sql = "UPDATE information SET gender = '$gender' WHERE username = '$username'";
							if (!mysqli_query($connect, $sql)) {
								echo "Thêm vào bảng thất bại!";
							}
							$kq = "Đổi giới tính thành công";
						}
					}
					if(isset($_GET['changeEmail'])){
						$email = $_GET['email'];
						if($email != ""){
							if(preg_match($pattern, $email, $matches)){
								$sql = "UPDATE information SET email = '$email' WHERE username = '$username'";
								if (!mysqli_query($connect, $sql)) {
									echo "Thêm vào bảng thất bại!";
								}
								$kq = "Đổi email thành công";
							} else{
								$kq = 'Email phải có @gmail.com';
							}
						}
					}
					if (isset($_GET['changePassword'])) {
						$password = $_GET['password'];
						$newPassword = $_GET['newPassword'];
						$reNewPassword = $_GET['reNewPassword'];
						if ($password != "" && $newPassword != "" && $reNewPassword != "") {
							if ($password == $row['password']) {
								if ($newPassword == $reNewPassword) {
									$sql = "UPDATE information SET password = '$newPassword' WHERE username = '$username'";
									if (!mysqli_query($connect, $sql)) {
										echo "Thêm vào bảng thất bại!";
									}
									$kq = "Đổi mật khẩu thành công";
								} else {
									$kq = "Mật khẩu nhập lại không trùng khớp";
								}
							} else {
								$kq = "Nhập sai mật khẩu";
							}
						} else {
							$kq = 'Nhập đủ mật khẩu để thay đổi';
						}
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
									<p id='" . 'infor' . "'>ĐỔI THÔNG TIN</p>
									<form action='" . "#" . "' method='" . 'post' . "' enctype=".'multipart/form-data'.">
										<div id='" . 'mk' . "'>
											<p class=".'p-infor'.">Avatar: </p>
											<input type='" . 'file' . "' class='" . 'p-infor-width' ."' name=" . 'avatar' . ">
											<input type='" . 'submit' . "' value='" . 'Đổi' . "' name=" . 'uploadFile' . ">
										</div>
									</form>
									<form action='" . "" . "' method='" . 'get' . "'>
										<div id='" . 'mk' . "'>
											<p class=".'p-infor'.">Họ và tên: </p>
											<input type='" . 'text' . "' value='" . $fullname . "' name=" . 'fullname' . ">
											<input type='" . 'submit' . "' value='" . 'Đổi' . "' name=" . 'changeFullname' . ">
										</div>
										<div id='" . 'mk' . "'>
											<p class=".'p-infor'.">Giới tính: </p>
											<span>
												<input type=".'radio'." name=".'gender'." checked=".'checked'." id=".'Nam'." value=".'Nam'.">
												<label>Nam</label>
												<input type=".'radio'." name=".'gender'." id=".'Nu'." value=".'Nữ'.">
												<label>Nữ</label>
												<input type=".'radio'." name=".'gender'." id=".'Khac'." value=".'Khác'.">
												<label>Khác</label>
											</span>
											<input type='" . 'submit' . "' value='" . 'Đổi' . "' name=" . 'changeGender' . ">
										</div>
										<div id='" . 'mk' . "'>
											<p class=".'p-infor'.">Email: </p>
											<input type='" . 'email' . "' value=" . $row['email'] . " name=" . 'email' . ">
											<input type='" . 'submit' . "' value='" . 'Đổi' . "' name=" . 'changeEmail' . ">
										</div>
									</form>
								</div>
								<div class='" . 'center' . "'>
									<p id='" . 'infor' . "'>ĐỔI MẬT KHẨU</p>
									<form action='" . "#" . "' method='" . 'get' . "'>
										<div id='" . 'mk' . "'>
											<p>Mật khẩu cũ: </p>
											<input type='" . 'password' . "' placeholder='" . 'Nhập mật khẩu cũ' . "' name=" . 'password' . ">
										</div>
										<div id='" . 'mk' . "'>
											<p>Mật khẩu mới: </p>
											<input type='" . 'password' . "' placeholder='" . 'Nhập mật khẩu mới' . "' name=" . 'newPassword' . ">
										</div>
										<div id='" . 'mk' . "'>
											<p>Nhập lại mật khẩu: </p>
											<input type='" . 'password' . "' placeholder='" . 'Nhập lại mật khẩu' . "' name=" . 'reNewPassword' . ">
										</div>
										<input type='" . 'submit' . "' class='" . 'submit-all' . "' value='" . 'Đổi mật khẩu' . "' name=" . 'changePassword' . ">
									</form>
								</div>
		            		</div>
		    		";
				}
			}
			if($kq != ""){
				echo '<br><br><div class="center">'.$kq.'</div>';
			}
			?>
		</div>
	</div>
</body>
<?php include "footer.php" ?>

</html>