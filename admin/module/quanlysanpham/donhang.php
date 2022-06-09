 <?php include '../xulydulieu/giohang.php';  ?>


 <?php
    $ct = new giohang();
    if(isset($_GET['shiftid'])){
    	$id = $_GET['shiftid'];
    	$proid = $_GET['proid'];
    	$qty = $_GET['qty'];
    	$time = $_GET['time'];
    	$price = $_GET['price'];
    	$shifted = $ct->shifted($id,$proid,$qty,$time,$price);
    }

    if(isset($_GET['delid'])){
    	$id = $_GET['delid'];

    	$time = $_GET['time'];
    	$price = $_GET['price'];
    	$del_shifted = $ct->del_shifted($id,$time,$price);
    }
 
  ?>


<div class="wraper_center_main_right-path">
    <div class="btn">
        <span class="fas fa-bars"></span>
    </div>
    <div class="detailed_path">
		<span><a href="index.php">Trang chủ</a></span>
        <span>/</span>
        <span>Đơn hàng</span>
    </div>
</div>
<div class="wraper_center_main_right-main">
    <div class="wraper_center_main_right-main--center main--centers">
        <div class="wraper_center_main_right-main--center_main">
			
			<table class="table sanpham donhang">
				<tr>
					<th>Stt</th>
					<th>Ngày đặt</th>
					<th>Hinh ảnh</th>
					<th>Sản phẩm</th>
					<th>Số lượng</th>
					<th>Giá</th>
					<th>Khách hàng</th>
					<th>Địa chỉ</th>
					<th>Xử lý</th>
				</tr>
				<?php 
					$ct = new giohang();
					$fm = new Format();
					$get_inbox_cart = $ct -> get_inbox_cart();
					if ($get_inbox_cart) {
						$i=0;
						while ($result = $get_inbox_cart->fetch_assoc()) {
							$i++;
					
				 ?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $fm->FormatDate($result['date_order']); ?></td>
					<td><img src="uploads/<?php echo $result['image'] ?> " alt=""></td>
					<td><?php echo $result['productName'] ?> </td>
					<td><?php echo $result['quantity'] ?></td>
					<td><?php echo $fm->format_currency($result['price']).' VNĐ' ?></td>
					<td><?php echo $result['customer_id'] ?></td>
					<td><a href="index.php?action=quanlykhachhang&query=khachhang&customerid=<?php echo $result['customer_id'] ?>">Thông tin khách hàng</a></td>
					<td>
						<?php 
						if($result['status']==0){
						 ?>

						<a href="index.php?action=quanlydonhang&query=donhang&shiftid=<?php echo $result['id'] ?>&qty=<?php echo $result['quantity'] ?>&proid=<?php echo $result['productId'] ?>&price=<?php echo $result['price']; ?>&time=<?php echo $result['date_order'] ?>">Chấp nhận đơn
						<?php 
						}elseif($result['status']==1) {
						 ?>

						<?php 
						echo 'Đang giao hàng...';
						 ?>
						 
						<?php 
						}elseif($result['status']==2) {

						 ?>
						<a href="index.php?action=quanlydonhang&query=donhang&delid=<?php echo $result['id'] ?>&price=<?php echo $result['price']; ?>&time=<?php echo $result['date_order'] ?>">Xóa đơn</a>
						 <?php 
						}
						 ?>
					</td>
				</tr>
				<?php
					}
				}

				?>
			</table>
			
       </div>
    </div>
</div>