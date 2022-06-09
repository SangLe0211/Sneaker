<?php 
	// gọi file adminlogin
	include '../xulydulieu/adminlogin.php';
 ?>
 <?php
 	// gọi class adminlogin
 	$class = new adminlogin(); 
 	if($_SERVER['REQUEST_METHOD'] == 'POST'){
 		// LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
 		$adminUser = $_POST['adminUser'];
 		$adminPass = md5($_POST['adminPass']);

 		$login_check = $class -> login_admin($adminUser,$adminPass); // hàm check User and Pass khi submit lên

 	}
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin login</title>
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
  <div class="wrapper">
    <form action="login.php" id="form_login" method="post">
      <h1 class="form_heading">Đăng nhập admin</h1>
      <span>
        <?php 
          if(isset($login_check)){
            echo $login_check;
          }
        ?> 
        </span>
      <div class="form_group">
        <i class="far fa-user"></i>
        <input type="text" class="form-input" placeholder="Username" required="" name="adminUser"/>
      </div>
      <div class="form_group">
        <i class="fas fa-key"></i>
        <input type="password" class="form-input" placeholder="Password" required="" name="adminPass"/>
        <div id="eye">
        <i class="far fa-eye"></i>
        </div>
      </div>
      <div class="btn_dangnhap">

        <input type="submit" value="Log in" class="form-submit">
      </div>
    </form>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="js/login.js"></script>
</html>