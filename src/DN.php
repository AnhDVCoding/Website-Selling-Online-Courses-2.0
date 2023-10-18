<?php
session_start();
include('../connectdb.php');

	if (isset($_SESSION['fullname'])) {
		header("location: khoa_hoc.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/DN_css.php">
    <title>Đăng nhập</title>
</head>
<?php
$kq = '';
$kq_er = '';
  if (isset($_POST['DangNhap'])) {
		if ($_POST['username'] == "" || $_POST['password'] == "") {
			$kq = "Vui lòng nhập đầy đủ tài khoản mật khẩu";
		} else {
			$username = $_POST['username'];
			$password = $_POST['password'];

			$sql = "SELECT username, password, fullname, permission FROM information WHERE username = '$username'";
			$result = mysqli_query($connect, $sql);
			if ($rowcount = mysqli_num_rows($result) > 0) {
				$row = mysqli_fetch_array($result);
				$_SESSION['fullname'] = $row['fullname'];
				$_SESSION['username'] = $username;
				$_SESSION['permission'] = $row['permission'];
				if ($row['password'] == $password) {
					echo "Đăng nhập thành công!";
					header("location: khoa_hoc.php");
					die();
				} else {
					$kq_er = "Tài khoản hoặc mật khẩu sai!";
				}
			} else {
				$kq_er = "Tài khoản hoặc mật khẩu sai!";
			}
		}
	}
?>
<body>
<div class="login">
  <h2 class="active"> Đăng nhập </h2>

  <h2 class="nonactive"><a href="./DK.php"> Đăng kí </a></h2>
  <form action="" method="post">
  <span>username</span>
    <input type="text" class="text" name="username">
    <br><br>

    <span>password</span>
    <input type="password" class="text" name="password">
    <br>

    <input type="checkbox" id="checkbox-1-1" class="custom-checkbox" />
    <label for="checkbox-1-1"></label>

    <?php if($kq != ''){
        echo '<br><br>' . '<span class="error">' . $kq . '</span>';
      } elseif($kq_er != '') {
        echo '<br><br>' . '<span class="error">' . $kq_er . '</span>';
      }
    ?>
    <input type="submit" class="signin" name="DangNhap" value="Đăng nhập">

    <hr>

    <a href="#">Forgot Password?</a>
  </form>

</div>
</body>
</html>