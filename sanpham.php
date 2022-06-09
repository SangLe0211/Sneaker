<?php include 'module/header.php'; ?>
</div>
<?php
     
    // if(!isset($_GET['idthuonghieu']) || $_GET['idthuonghieu'] == NULL){
    //     // echo "<script> window.location = '404.php' </script>";
        
    // }else {
    //     $id = $_GET['idthuonghieu']; // Lấy catid trên host
    // }
        
        $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:12;
    	$current_page =!empty($_GET['page'])?$_GET['page']:1;
    	$offset = ($current_page - 1) * $item_per_page;
    	$query = mysqli_query($conn,"SELECT tbl_sanpham.*, tbl_thuonghieu.brandName  FROM tbl_sanpham JOIN tbl_thuonghieu ON tbl_sanpham.brandId = tbl_thuonghieu.brandId   order by productId desc LIMIT ".$item_per_page." OFFSET ".$offset.	"") ;
    	$totalRecords = mysqli_query($conn, "SELECT tbl_sanpham.*, tbl_thuonghieu.brandName  FROM tbl_sanpham JOIN tbl_thuonghieu ON tbl_sanpham.brandId = tbl_thuonghieu.brandId");
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
                <li><a href="#">Sản phẩm</a></li>
                <!-- <?php 
                // }
                // }
                ?> -->
            </div>

           
        </div>
        <div class="main_center_products_all-productss">
            <div class="main_center_products_all-productss_rights">
                <div class="main_center_products_all-productss_rights_content">
                    <!-- <?php 
                        // $name_brand = $brand->get_name_by_brand($id);
                        // if ($name_brand) {
                        //     while ($result_name = $name_brand->fetch_assoc()) {
                        //         # code...
                    ?> -->
                    <div class="product_content-heading">
                        <h2>Tất cả sản phẩm</h2>
                    </div>
                    <!-- <?php 
                    // }
                    // }
                    ?> -->
                    <div class="product_content-detail_right">
                        <div class="product_content-detail_right_content">
                          <?php 
                            //   $product_new = $product->get_tat_ca_san_pham();
                            //   if($product_new){
                                //   while ($result_new = $product_new->fetch_assoc()) {
                                    while ($result_new = mysqli_fetch_array($query)) {
                          ?>
                            <div class="produce-item">
                                <div class="produce-item_image">
                                  <a href="product_details.php?proid=<?php echo $result_new['productId'] ?>">
                                    <img src="admin/uploads/<?php echo $result_new['image'] ?>" alt="">
                                    <div class="buy_now ">
                                        <a href="product_details.php?proid=<?php echo $result_new['productId'] ?>">Click để xem chi tiết</a>
                                        <button class="btn_chitiet"><a href="product_details.php?proid=<?php echo $result_new['productId'] ?>">Mua ngay</a> </button>
                                    </div>
                                </a>
                                </div>
                                <a href="product_details.php?proid=<?php echo $result_new['productId'] ?>">
                                  <div class="produce-item_lable">
                                      <h3><?php echo $fm->textShortenn($result_new['brandName'], 25) ?></h3>
                                      <h4><?php echo $fm->textShorten($result_new['productName'], 45) ?></h4>
                                      <span><?php echo $fm->format_currency($result_new['price'])." VND" ?></span>
                                  </div>
                              </a>
                            </div>
                           
                            <?php 
                            }
                            // }else {
                            //     echo "Sản phẩm này hiện chưa có trong danh mục";
                            // }
                            ?>
                        </div>
                             <?php
                                include './xulydulieu/phantrang.php';
                            ?>
                        
                            
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'module/footer.php'; ?>