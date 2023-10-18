<?php  
session_start();
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
    <link rel="stylesheet" href="./DKDN.css">
    <title>Đăng ký/Đăng nhập</title>
</head>
<body>
<div class="login">
  <h2 class="active"> Đăng nhập </h2>

  <h2 class="nonactive"> Đăng kí </h2>
  <form>
    <input type="text" class="text" name="username">
    <span>username</span>

    <br>
    
    <br>

    <input type="password" class="text" name="password">
    <span>password</span>
    <br>

    <input type="checkbox" id="checkbox-1-1" class="custom-checkbox" />
    <label for="checkbox-1-1"></label>
    
    <button class="signin">
      Đăng nhập
    </button>

    <!-- <button class="signup">
      Sign Up
    </button> -->

    <hr>

    <a href="#">Forgot Password?</a>
  </form>

</div>
</body>
</html>