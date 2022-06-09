

<?php 
	include 'module/header.php';
	// include 'inc/slider.php';
 ?>
 </div>
 <?php 
	  $login_check = Session::get('customer_login');
	  if ($login_check==false) {
	  	header('Location:login.php');
	  }
	   ?>
       <?php 
       $id = Session::get('customer_id');
       if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])){
           // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
           $UpdateCustomers = $cs -> update_customers($_POST, $id); // hàm check catName khi submit lên
       } 
    ?>
 <div class="main products">
    <div class="main_center_products">
        <div class="main_center_products-path">
            <div class="main_center_products-path_center">
                <li><a href="index.php">Trang chủ</a></li>
                <span>/</span>
                <span><a href="thongtin.php">Tài khoản</a></span>
                <span>/</span>
                <li><a href="#">Cập nhật tài khoản</a></li>
            </div>
        </div>
        <div class="main_center_thongtin">
			<div class="main_center_thongtin_update">
				<div class="main_center_thongtin_update_heading">
					<h2>Cập nhật tài khoản</h2>
				</div>
				<div class="main_center_thongtin_update_content">
                    <form action="" method="post">
                        <tr>
                            <?php 
                                if (isset($UpdateCustomers)) {
                                    echo $UpdateCustomers;
                                }
                            ?>
                        </tr>
                        <table>

                            <?php 
                            $id = Session::get('customer_id');
                            $get_customers = $cs->show_customers($id);
                            if ($get_customers) {
                                while ($result = $get_customers->fetch_assoc()) {
                                
                            ?>
                            <tr>
                                <td>Họ và tên</td>
                                
                                  
                                <td><input type="text" name="name" value="<?php echo $result['name']; ?>"></td>
                            </tr>
                            <!-- <tr>
                                <td>City</td>
                                
                                <td><input type="text" name="name" value="<?php echo $result['city']; ?>"></td>
                                
                            </tr> -->
                            <tr>
                                <td>Số điện thoại</td>
                                
                                <td><input type="text" name="phone" value="<?php echo $result['phone']; ?>"></td>
                                
                            </tr>
                            <tr>
                                <td>Email</td>
                                
                                <td><input type="text" name="email" value="<?php echo $result['email']; ?>"></td>
                                
                            </tr>
                            <tr>
                                <td>Địa chỉ</td>
                                
                                <td><input type="text" name="address" value="<?php echo $result['address']; ?>"></td>
                                
                            </tr>
                            <tr>
                                
                                <td colspan="2" class="td_capnhat"  >
                                    <a href="thongtin.php"><i class="fa fa-reply"> </i>Trở về</a>
                                    <input class="btn_capnhat" type="submit" name="save" value="Cập nhật" class="grey" >
                                </td>
                            
                            </tr>
                            
                            <?php 
                            }
                            }
                            ?>
                        </table>
                    </form>
				</div>
			</div>
        </div>
    </div>
</div>
<?php 
	include 'module/footer.php';
 ?>
