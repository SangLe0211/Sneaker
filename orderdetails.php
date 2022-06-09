
 
<?php include 'module/header.php'; ?>
</div>
<?php 
	$login_check = Session::get('customer_login');
	  if ($login_check==false) {
	  	header('Location:login.php');
	  }
 ?>
 <?php
	if(isset($_GET['confirmid'])){
     	$id = $_GET['confirmid'];
     	$time = $_GET['time'];
     	$price = $_GET['price'];
     	$shifted_confirm = $ct->shifted_confirm($id,$time,$price);
		
    }
	$customer_id = Session::get('customer_id');
	$item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:8;
	$current_page =!empty($_GET['page'])?$_GET['page']:1;
	$offset = ($current_page - 1) * $item_per_page;
	$query = mysqli_query($conn,"SELECT * FROM tbl_donhang WHERE customer_id = '$customer_id' order by id desc LIMIT ".$item_per_page." OFFSET ".$offset.	"") ;
	$totalRecords = mysqli_query($conn, "SELECT * FROM tbl_donhang ");
	$totalRecords = $totalRecords->num_rows;
	$totalPages = ceil($totalRecords / $item_per_page);
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
                <li><a href="#">Đơn hàng</a></li>
                <!-- <?php 
                // }
                // }
                ?> -->
            </div>

           
        </div>
        <div class="main_center_products_all-productss">
			<div class="productss_chitiet_don">
				<div class="productss_chitiet_don_heading">
					<h2>Chi tiết của bạn đã đặt hàng</h2>
				</div>
				<?php
				$customer_id = Session::get('customer_id');
                    $check_cart = $ct->check_donhang($customer_id);
                    if ($check_cart) {
                ?>
				<table class="table sanpham">
					<tr>
						<!-- <th>sId</th> -->
						<th >STT</th>
						<th >Hình ảnh</th>
						<th >Tên sản phẩm</th>
						<th >Giá</th>
						<th >Số lượng</th>
						<th >Ngày</th>
						<th >Trạng thái</th>
						<th >Xử lý</th>
					</tr>
					
					<?php
						$customer_id = Session::get('customer_id');  
						// $get_cart_ordered = $ct->get_cart_ordered($customer_id);
						// if($get_cart_ordered){
							$i=0;
							$qty = 0;
							while ($result = mysqli_fetch_array($query)) {
								$i++;	
					?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td>
						<td><?php echo $result['productName'] ?></td>
						<td><?php echo $fm->format_currency($result['price']).' VND' ?></td>
						<td><?php echo $result['quantity'] ?></td>
						<td><?php echo $fm->formatDate($result['date_order'])  ?></td>
						<td>
						<?php 
							if ($result['status'] == '0') {
								echo "Đang chờ xác nhận";
							}elseif($result['status'] == 1) {
						?>
						<span>Đang Giao hàng</span>
						
						<?php

							}elseif($result['status']==2){
								echo 'Đã nhận';
							}
						?>	

						</td>
						<?php 
						if ($result['status'] == '0') {
						?>

						<td><?php echo 'Đang xử lý'; ?></td>

						<?php 
						}elseif($result['status']==1) {
						?>	
						<td >
							<a style ="color:red;" href="?confirmid=<?php echo $customer_id ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>">Xác nhận đã nhận hàng</a>
						</td>
						<?php 
						}else{
						?>
						
						<td><?php echo 'Đã nhận'; ?></td>
						<?php 
						}
						?>
					</tr>
					<?php 							
						// }
					}
					?>
				</table>
				<?php include './xulydulieu/phantrang.php';  ?>
				<?php 
					}else {
						echo'
							<div class="thongbao">
								<h3>Bạn chưa có đơn hàng nào! Hãy đặt hàng ngay bây giờ</h3>
								<div class="thongbao_button">
									<a href="giohang.php"> <i class="fa fa-reply"> </i>Đặt hàng</a>
								</div>
							</div>
						';
					}
				?>
			</div>
        </div>
    </div>
</div>
<?php include 'module/footer.php'; ?> 	
