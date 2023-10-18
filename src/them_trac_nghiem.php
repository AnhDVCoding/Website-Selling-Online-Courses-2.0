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
	


	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Thêm trắc nghiệm</title>
</head>
<body>
<?php  
		// $id_bai_hoc = $_GET['id_bai_hoc'];
?>
<form method="POST" action="">
	<input type='text' name='question' placeholder="Câu hỏi">
	<input type="checkbox" name="multiple_choice" value='yes'>
	<br>
	<input type="radio" id="id1" name="answer" value="">
	<label for="id1">
		<input type='text' name='answer' placeholder="Lựa chọn 1">
	</label><br>
	<input type="radio" id="id2" name="answer" value="">
	<label for="id2">
		<input type='text' name='answer' placeholder="Lựa chọn 2">
	</label><br>


	<input type='submit' name="send" value="Gửi">

</form>

<?php  
	$tra_loi = "";
	if (isset($_POST['send'])) {
		$cau_hoi = $_POST['question'];
		$tra_loi .= $_POST['answer'];

		echo $cau_hoi;
		echo $tra_loi;
	}
?>
</body>
</html>