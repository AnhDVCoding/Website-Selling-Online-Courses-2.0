<?php
session_start();
	include '../connectdb.php';
	include "../function.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<style type="">
		
#box{
		margin : 0 auto;
		width : 450px;
		border : 2px solid blue;
		border-radius : 7px;
	}
	.noidung{
		padding : 15px;
		text-align: left;
		font-size: 20px;
	}
	.head{
		background :  #6793B1;
		min-height: 20px;
	}
	.tieude{
		padding: 5px 15px;
		font-size: 20px;
		color :white;
		font-weight: bold;
		text-align: left;
	}
	
	.input{
		margin-top: 10px;
	}
	
	
		
	</style>
<body>
<form method="POST" action="">
	<?php
		$count = 0;
		$SL = 6;
		$SQL = "SELECT id_cau_hoi, cau_hoi
                    FROM question";
            $Query = mysqli_query($connect, $SQL);

            if (mysqli_num_rows($Query) > 0) {
            	$i = 1;
            	while($questionTB = mysqli_fetch_assoc($Query)) {
            		if ($count == $SL) {
            			break;
            		}
            		$id_cau_hoi = $questionTB['id_cau_hoi'];
            		$cau_hoi = $questionTB['cau_hoi'];
		    		echo "
		    			<div id='box'>
							<div class='head'>
								<div class='tieude' align='center'>Câu ".$i.": ".$cau_hoi."</div>
							</div>
							<div class='noidung'>";

					$AnswerQuery = getDLfromAnswer($connect, $id_cau_hoi);
					if (mysqli_num_rows($AnswerQuery) > 0) {
						while($DLAnswer = mysqli_fetch_assoc($AnswerQuery)) {

							
							$id_cau_tra_loi = $DLAnswer['id_cau_tra_loi'];
							$cau_tra_loi = $DLAnswer['cau_tra_loi'];
							// $arr[] = $id_cau_tra_loi;
		    				echo "
		    					<input type='radio' name='Question".$i."' id='".$id_cau_tra_loi."' value = '".$id_cau_tra_loi."'>
								<label for='".$id_cau_tra_loi."'>".$cau_tra_loi."</label>
								<br>";

		    			}
		    		echo "
		    				</div>
		    			</div>
		    			<br>";
		    			
					}	

					$count++;
					$i++;	
		    	}
            }
	?>
	<input type='submit' name="send" value="Gửi">
</form>


	<?php
		$diem = 0;
		if (isset($_POST['send'])) {
			for ($i = 1; $i <= $SL; $i++) {
				if (isset($_POST["Question".$i])) {
					$SQL = "
						SELECT tinh_trang
						FROM answer
						WHERE id_cau_tra_loi =".$_POST["Question".$i];
					$Query = mysqli_query($connect, $SQL);
					$row = mysqli_fetch_assoc($Query);
					if ($row['tinh_trang'] == 1) {
						$diem++;
					}
				
				}
			}

			echo "Bạn đúng: ".$diem." câu";


		}
	?>

</body>
</html>