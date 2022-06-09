

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

 <div class="main products">
    <div class="main_center_products">
        <div class="main_center_products-path">
            <div class="main_center_products-path_center">
                <li><a href="index.php">Trang chủ</a></li>
                <span>/</span>
                <!-- <?php 
                    // $name_brand = $brand->get_name_by_brand($id);
                    // if ($name_brand) {
                    //     while ($result_name = $name_brand->fetch_assoc()) {
                    //         # code...
                ?> -->
                <li><a href="#">Tài khoản</a></li>
                <!-- <?php 
                // }
                // }
                ?> -->
            </div>
        </div>
        <div class="main_center_thongtin">
			<div class="main_center_thongtin_update">
				<div class="main_center_thongtin_update_heading thongtin">
					<h2>Thông tin tài khoản của bạn</h2>
				</div>
				<div class="main_center_thongtin_update_content">
					<table>
						<?php 
						$id = Session::get('customer_id');
						$get_customers = $cs->show_customers($id);
						if ($get_customers) {
							while ($result = $get_customers->fetch_assoc()) {
							
						?>
						<tr>
							<td>Tên tài khoản</td>
							<td><input type="text" readonly="readonly" value="<?php echo $result['name']; ?>"></td>
						</tr>
						<tr>
							<td>Số điện thoại</td>
							<td><input type="text" readonly="readonly" value="<?php echo $result['phone']; ?>"></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><input type="text" readonly="readonly" value=" <?php echo $result['email']; ?>"></td>
						</tr>
						<tr>
							<td>Thành Phố</td>
							<td><input type="text" readonly="readonly" value="<?php echo $result['city']; ?>"></td>
						</tr>
						
						<tr>
							<td>Địa chỉ</td>
							<td><input type="text" readonly="readonly" value=" <?php echo $result['address']; ?>"></td>
						</tr>
						<tr>
							<td colspan="3" class="td_capnhat"><a href="capnhat_thongtinKH.php">Cập nhật thông tin</a></td>
						
						</tr>
						
						<?php 
						}
						}
						?>
					</table>
				</div>
			</div>
        </div>
    </div>
</div>
<?php 
	include 'module/footer.php';
 ?>
