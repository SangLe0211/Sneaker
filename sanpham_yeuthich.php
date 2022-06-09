<?php 
	include 'module/header.php';
	// include 'inc/slider.php';
 ?>
 </div>
 <?php 

    if(isset($_GET['proid'])){
    	$customer_id = Session::get('customer_id');
     	$proid = $_GET['proid']; 
      	$delwlist = $product->del_wlist($proid,$customer_id);
 	}
     $customer_id = Session::get('customer_id');
     $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:8;
     $current_page =!empty($_GET['page'])?$_GET['page']:1;
     $offset = ($current_page - 1) * $item_per_page;
     $query = mysqli_query($conn,"SELECT * FROM tbl_ds_yeuthich where customer_id ='$customer_id'  order by id desc LIMIT ".$item_per_page." OFFSET ".$offset.	"") ;
     $totalRecords = mysqli_query($conn, "SELECT * FROM tbl_ds_yeuthich ");
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
                <li><a href="#">Yêu thích</a></li>
                <!-- <?php 
                // }
                // }
                ?> -->
            </div>
        </div>
        <div class="main_center_products_all-productss">
			<form action="" method="POST">
				<div class="products_all-productss_content">
					<div class="products_all-productss_content_main">
						<div class="products_all-productss_content_left_heading">
							<h2>Sản phẩm yêu thích</h2>
						</div>
                        <?php
                            $check_cart_yeu_thich = $ct->check_cart_yeuthich($customer_id);
                            if ($check_cart_yeu_thich) {
                        ?>
                        <table class="table sanpham">
                            <tr>
                                <th >STT</th>
								<th >Hình ảnh</th>
								<th >Tên sản phẩm</th>
								<th >Giá</th>
								<th >Xử lý</th>
                            </tr>
                            
                            <?php 
							$customer_id = Session::get('customer_id');
							// $get_wishlist = $product->get_wishlist($customer_id);
							// if($get_wishlist){
								$i = 0;
							// 	while ($result = $get_wishlist->fetch_assoc()) {
								
                                while ($result = mysqli_fetch_array($query)) {
								$i++;	
							 ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><img src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td>
								<td><?php echo $result['productName'] ?></td>
								<td><?php echo $fm->format_currency($result['price']). ' VND' ?></td>
								
								<td>
                                    <div class="xuly_chung">
                                        <div class="xuly xuly_update">
                                            <a class="Muahang_yeuthich" href="product_details.php?proid=<?php echo $result['productId'] ?>">Mua Ngay</a>
                                        </div>
                                        <div class="xuly xuly_delete">
                                            <a onclick = "return confirm('Are you want to delete <?php echo $result['productName'] ?>???')" href="?proid=<?php echo $result['productId'] ?>">Xóa</a>
                                        </div>
                                    </div>
								</td>
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
                                        <h3>Bạn chưa có sản phẩm yêu thích nào! Hãy thêm sản phẩm bạn yêu thích ngay bây giờ</h3>
                                        <div class="thongbao_button">
                                            <a href="sanpham.php"> <i class="fa fa-reply"> </i>Thêm sản phẩm</a>
                                        </div>
                                    </div>
                                ';
                            }
                        ?>
                       
					</div>
				</div>
				
			</form>
            
        </div>
    </div>
</div>
<?php 
	include 'module/footer.php';
 ?>
