<?php include 'module/header.php'; ?>
</div>
<?php 
	  $login_check = Session::get('customer_login');
	  if ($login_check==true) {
	  	header('Location:index.php');
	  }
	   ?>
<?php
    // gọi class category
     
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $insertCustomer = $cs -> insert_customer($_POST); // hàm check catName khi submit lên
    }
 ?>
<div class="main products">
    <div class="main_center_products">
        <div class="main_center_products_all-productss_dangky">
            <div class="productss_dangky_main">
                <div class="productss_dangky_heading">
                    <h3>Thông tin đăng ký tài khoản</h3>
                </div>
                <?php 
                    if (isset($insertCustomer)) {
                        echo $insertCustomer;
                    }
                 ?>
                <form action="" method="POST">
                    
                    <table >
                        <div class="productss_dangky_form">
                            <div class="productss_form_row">
                                <label for="">Họ và tên:</label><br>
                                <input type="text" name="name" placeholder="Nhập tên...">
                            </div>
                            <div class="productss_form_row">
                                <label for="">Thành phố</label><br>
                                <input type="text" name="city" placeholder="Nhập thành phố..." >
                            </div>
                            <div class="productss_form_row">
                                <label for="">Email</label><br>
                                <input type="email" name="email" placeholder="Nhập E-Mail...">
                            </div>
                            <div class="productss_form_row">
                                <label for="">Địa chỉ</label><br>
                                <input type="text" name="address" placeholder="Nhập địa chỉ...">
                            </div>
                            <div class="productss_form_row">
                                <label for="">Số điện thoại</label><br>
                                <input type="number" name="phone" placeholder="Nhập số điện thoại...">
                            </div>
                            <div class="productss_form_row">
                                <label for="">Password</label><br>
                                <input type="password" name="password" placeholder="Nhập Password... ">
                            </div>
                        </div>
                    </table>
                    <div class="productss_form_button">
                       <input type="submit" name="submit" class="grey" value="Tạo tài khoản">
                       
                       <h4>Bạn đã có tài khoản? <a href="login.php">Đăng nhập</a></h4>
                    </div>
                   
                </form>
                
            </div>
        </div>
    </div>
</div>

<?php include 'module/footer.php'; ?>



