<?php include 'module/header.php'; ?>
</div>
<?php 
	$login_check = Session::get('customer_login');
	if ($login_check) {
		header('Location:index.php'); 
	}
    ?>
     <?php 
 	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $login_Customer = $cs -> login_customer($_POST); // hàm check catName khi submit lên
    }
 ?>
<div class="main products">
    <div class="main_center_products">
        <div class="main_center_products_all-productss_login">
            <div class="productss_login_left">
                <div class="productss_login_heading">
                    <h3>Khách hàng đã đăng ký</h3>
                </div>
                
                <?php 
                    if (isset($login_Customer)) {
                        echo $login_Customer;
                    }
                    ?>
                <form action="" method="POST">
                    <div class="productss_form_dangnhap">
                        <label for="">Email</label><br>
                        <input type="text" name="email" class="field" placeholder="Nhập email..." >
                    </div>
                    <div class="productss_form_dangnhap">
                        <label for="">Password</label><br>
                        <input type="password" name="password" class="field" placeholder="Nhập password..." >
                    </div>
                    <div class="productss_form_button">
                        <input type="submit" name="login" class="grey" value="Đăng nhập" style="background: #ffffff;">
                    </div>

                </form>
            </div>
            <div class="productss_login_right">
                <div class="productss_login_heading">
                    <h3>Khách Hàng đăng Ký mới</h3>
                </div>
                <h4>Bằng cách tạo tài khoản với cửa hàng của chúng tôi, bạn sẽ có thể di
                chuyển qua quy trình thanh toán nhanh hơn, lưu trữ nhiều địa chỉ giao hàng,
                 xem và theo dõi đơn hàng của bạn trong tài khoản của bạn và hơn thế nữa.</h4>
                
                <div class="productss_form_right">
                    <a href="dangky.php"><div class="productss_form_button">Đăng ký</div></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'module/footer.php'; ?>



