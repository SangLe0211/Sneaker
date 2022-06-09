<?php include 'module/header.php'; ?>
</div>
<?php
    
	if(isset($_POST['timkiem'])){
        $tukhoa =$_POST['tukhoa'];
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
                    <?php 
                    if(!empty($tukhoa)){
                        $sql_pro = "SELECT * FROM tbl_sanpham,tbl_thuonghieu WHERE tbl_sanpham.brandId=tbl_thuonghieu.brandId AND tbl_sanpham.productName LIKE '%".$tukhoa."%'";
                        $query_pro = mysqli_query($conn,$sql_pro);
                    ?>
                    <div class="product_content-heading">
                        <h2>Từ khoá tìm kiếm : <?php echo $_POST['tukhoa']; ?></h2>
                    </div>
                    <!-- <?php
                        // $check_cart = $ct->check_cart();
                        // if ($check_cart) {
                    ?> -->
                    <div class="product_content-detail_right">
                        <div class="product_content-detail_right_content">
                          <?php 
                          
                            while($row = mysqli_fetch_array($query_pro)) {
                          ?>
                            <div class="produce-item">
                                <div class="produce-item_image">
                                  <a href="product_details.php?proid=<?php echo $row['productId'] ?>">
                                    <img src="admin/uploads/<?php echo $row['image'] ?>" alt="">
                                    <div class="buy_now ">
                                        <a href="product_details.php?proid=<?php echo $row['productId'] ?>">Click để xem chi tiết</a>
                                        <button class="btn_chitiet"><a href="product_details.php?proid=<?php echo $row['productId'] ?>">Mua ngay</a> </button>
                                    </div>
                                </a>
                                </div>
                                <a href="product_details.php?proid=<?php echo $row['productId'] ?>">
                                  <div class="produce-item_lable">
                                      <h3><?php echo $fm->textShortenn($row['brandName'], 25) ?></h3>
                                      <h4><?php echo $fm->textShorten($row['productName'], 45) ?></h4>
                                      <span><?php echo $fm->format_currency($row['price'])." VND" ?></span>
                                  </div>
                              </a>
                            </div>
                           
                            <?php 
                            }
                        
                            // }
                            // else{
                            //     echo "Rất tiếc, Sneaker không tìm thấy kết quả nào phù hợp với từ khóa:  " ; 
                            //     echo $_POST['tukhoa'];
                            // }
                            ?>
                        </div>
                    </div>
                    <?php
                    }else{
                        echo'<div class="product_content-heading-error">
                                <h2>Từ khoá tìm kiếm :</h2>
                                <h3>Từ khóa đang trống. Bạn hãy nhập một từ khóa bất kỳ để tìm kiếm! </h3>
                            </div>
                            ';
                    }
                ?>
                </div>
            </div>
        </div>
        
    
       
    </div>
</div>
<?php include 'module/footer.php'; ?>


