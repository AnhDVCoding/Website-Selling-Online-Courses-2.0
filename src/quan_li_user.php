<?php
	include '../connectdb.php';
	include '../function.php';


	session_start();

	if (!isset($_SESSION['fullname'])) {
		header("location: DN.php");
	}

	$fullname = $_SESSION['fullname'];
	$username = $_SESSION['username'];
	$permission = getPermission($connect, $username);



	if ($_SESSION['permission'] != 2) {
		header("location: khoa_hoc.php");
	}


?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../css/quan_li_user_css.php">
	<link rel="stylesheet" href="../css/font-awesome-4.7.0/css/font-awesome.css">
	<link rel="stylesheet" href="../css/style.php">
</head>
<style type="text/css">

</style>
<body>
	<?php include 'header.php'; ?>
	<br>
	<div class="box1">
		<br>
		<div class="box2">

<div class="box3" style="overflow-x:auto;">
<table id="users">
  	<tr>
	    <th>STT</th>
	    <th>Họ và tên</th>
	    <th>Username</th>
	    <th>Email</th>
	    <th>Giới tính</th>
	    <th>Quyền hạn</th>
	    <th>Xóa</th>
	</tr>
<!-- </table>
<table id="users"> -->
	<div class="list_user_item" id="scroll">
	<?php  
		$SQL = "
				SELECT *
				FROM information
				ORDER BY permission DESC";

		$DLFromInformation = mysqli_query($connect, $SQL);
		if (mysqli_num_rows($DLFromInformation) > 0) {
			$i = 1;
			while($listUsers = mysqli_fetch_assoc($DLFromInformation)) {
				if(isset($_POST["quyen"])){
					       $quyen = $_POST["quyen"];
					       $username = $_POST["username"];

					       $SQL = "UPDATE information SET permission =".$quyen." WHERE username ='".$username."'";
					       if (!$Query = mysqli_query($connect, $SQL)) {
					       	echo "Lỗi SQL";
					       }
					    }
		    		echo "

		    			<tr>
		    				<td>".$i."</td>
		    				<td>".$listUsers['fullname']."</td>
		    				<td>".$listUsers['username']."</td>
		    				<td>".$listUsers['email']."</td>
		    				<td>".$listUsers['gender']."</td>
		    				<form method='POST' action=''>
		    				<td>
		    					
		    						<input type='hidden' name='username' value='".$listUsers['username']."'>
		    						<select name='quyen' onchange='this.form.submit()'>
										<option value='2'";

										if ($listUsers['permission'] == 2) {
											echo " selected";
										};

										echo ">Quản trị</option>

										<option value='1'";
										if ($listUsers['permission'] == 1) {
											echo " selected";
										};

										echo ">Giảng viên</option>

										<option value='0'";
										if ($listUsers['permission'] == 0) {
											echo " selected";
										};

										echo ">Học viên</option>
									

									</select>
									

								
		    				</td>
		    				<td>
		    					<a href='xoa_user.php?username_del=".$listUsers['username']."'>Xóa</a>
		    				</td>
		    				</form>

		    				
		    			</tr>";

		    			
		    			$i++;
		    }
		}

		// for ($i = 11; $i <= 30; $i++) { 
		// 	$uname = "user".$i;
		// 	$pword = "12345678";
		// 	$fname = "Người dùng ".$i;
		// 	$mail = "user".$i."@gmail.com";
		// 	$gder = "Nam";
		// 	$pmission = "0";

		// 	$SQL = "INSERT INTO information (username, password, fullname, email, gender, permission) VALUES ('".$uname."', '".$pword."', '".$fname."', '".$mail."', '".$gder."', '".$pmission."')";

		// 	$Query = mysqli_query($connect, $SQL);

		// }
		
	?>

		</div>
		</table>
</div>
		</div>
		<br>
	</div>
</body>
</html>


