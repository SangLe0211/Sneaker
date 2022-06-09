
 <?php include 'module/header.php'; ?>
</div>
<?php 
	if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
		$customer_id = Session::get('customer_id');
		$insertOrder = $ct->insertOrder($customer_id);
		header('Location:success.php');
		$delCart = $ct->del_all_data_cart();
    }
	
	?>
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
                <span><a href="index.php">Giỏ hàng</a></span>
                <span>/</span>
                <span><a href="#">Đặt hàng</a></span>
                <!-- <?php 
                    // $name_brand = $brand->get_name_by_brand($id);
                    // if ($name_brand) {
                    //     while ($result_name = $name_brand->fetch_assoc()) {
                    //         # code...
                ?> -->
                <li><a href="#"></a></li>
                <!-- <?php 
                // }
                // }
                ?> -->
            </div>

           
        </div>
        <div class="main_center_products_all-productss">
			<form action="" method="POST">
				<div class="products_all-productss_content">
					<div class="products_all-productss_content_left">
						<div class="products_all-productss_content_left_heading">
							<h2>Đặt hàng</h2>
						</div>
							<?php 
							if (isset($update_quantity_Cart)) {
								echo $update_quantity_Cart;
							}
							?>
							<?php 
							if (isset($delcart)) {
								echo $delcart;
							}
							?>
							<?php
							if(isset($delcart)){
								echo $delcart;
							}
							?>
								<!-- <table class="tblone">
									<tr>
										<th width="5%">Stt</th>
										<th width="15%">Tên sản phẩm</th>
										<th width="15%">Giá</th>
										<th width="25%">Số lượng</th>
										<th width="20%">Tổng giá</th>
										
									</tr>
									<?php 
									$get_product_cart = $ct->get_product_cart();
									if($get_product_cart){
										$subtotal = 0;
										$qty = 0;
										$i=0;
										while ($result = $get_product_cart->fetch_assoc()) {
											$i++;
										
									?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $result['productName'] ?></td>
										
										<td><?php echo $result['price'].' VND' ?></td>
										<td>
											<?php echo $result['quantity'] ?>
										</td>
										<td>
											<?php 
											$total = $result['price'] * $result['quantity'];
											echo $total.' VND';
											?>
										</td>
										
									</tr>
									<?php 

									$subtotal += $total;
									$qty = $qty + $result['quantity'];
										}
									}
									?>
			
								</table> -->
								<table class="table sanpham">
									<tr>
										<th>Stt</th>
										<th>Hình ảnh sản phẩm</th>
										<th>Tên sản phẩm</th>
										<th>Giá</th>
										<th>Số Lượng</th>
										<th>Tổng giá</th>
										
									</tr>
									
									<?php 
										$get_product_cart = $ct->get_product_cart();
										if($get_product_cart){
											$subtotal = 0;
											$qty = 0;
											$i=0;
											while ($result = $get_product_cart->fetch_assoc()) {
												$i++;
											
									?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td>
										<td><?php echo $result['productName'] ?></td>
										
										<td><?php echo $fm->format_currency($result['price']).' VND' ?></td>
										<td>
											<?php echo $result['quantity'] ?>
										</td>
										<td>
											<?php 
											$total = $result['price'] * $result['quantity'];
											echo $fm->format_currency($total).' VND';
											?>
										</td>
									</tr>
									<?php 

									$subtotal += $total;
									$qty = $qty + $result['quantity'];
										}
									}
									?>
								</table>

					</div>
					<div class="products_all-productss_content_right">
						<table class="productss_content_right_thongtin">
							<?php 
							$id = Session::get('customer_id');
							$get_customers = $cs->show_customers($id);
							if ($get_customers) {
								while ($result = $get_customers->fetch_assoc()) {
								
							?>
							<tr>
								<td>Tên</td>
								<td>:</td>
								<td><?php echo $result['name']; ?></td>
							</tr>
							<tr>
								<td>Thành Phố</td>
								<td>:</td>
								<td><?php echo $result['city']; ?></td>
							</tr>
							<tr>
								<td>Số điện thoại</td>
								<td>:</td>
								<td><?php echo $result['phone']; ?></td>
							</tr>
							
							<tr>
								<td>Email</td>
								<td>:</td>
								<td><?php echo $result['email']; ?></td>
							</tr>
							<tr>
								<td>Địa chỉ</td>
								<td>:</td>
								<td><?php echo $result['address']; ?></td>
							</tr>
							<tr>
								<td colspan="3"><a href="capnhat_thongtinKH.php">Cập nhật thông tin</a></td>
							
							</tr>
							
							<?php 
							}
							}
							?>
						</table>	
						<div class="productss_content_right_tongtien">
							<h2>Đơn hàng của bạn</h2>
							<?php
							$check_cart = $ct->check_cart($customer_id);
							if ($check_cart) {
							?>
							<table class="tongtien_table" style="float:right;text-align:left;" width="40%">
								<tr>
									<th>Tổng giá : </th>
									<td>
									<?php echo $fm->format_currency($subtotal).' VND';

										Session::set('sum',$subtotal);
										Session::set('qty',$qty);
									?>
									</td>
								</tr>
								<tr>
									<th>Thuế : </th>
									<td>0%</td>
								</tr>
								<tr>
									<th>Tổng cộng :</th>
									<td><?php 
									$vat = $subtotal * 0;
									$grandTotal = $subtotal + $vat;
									echo $fm->format_currency($grandTotal).' VND';
									?> </td>
								</tr>
							</table>
							
							<?php 
								}else {
									echo 'Your cart is Empty ! Please Shopping now';
								}
							?>
							<div class="tongtien_dathang">
								<a href="?orderid=order" class="a_order">Đặt hàng ngay</a>
							</div>
						</div>
								
					</div>
				</div>
				
			</form>
            
        </div>
    </div>
</div>
<?php include 'module/footer.php'; ?>