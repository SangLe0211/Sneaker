<?php include 'module/header.php'; ?>
</div>

<?php
    if(isset($_GET['proid'])){
        $id = $_GET['proid'];
        $img_pro = mysqli_query($conn, "SELECT * FROM tbl_image_products where id_product = $id");
    }
    ?>
<?php
    if(!isset($_GET['proid']) || $_GET['proid'] == NULL){
        echo "<script> window.location = 'index.php' </script>";
        
    } else {
        $id = $_GET['proid']; // Lấy productid trên host
        
    } 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $quantity = $_POST['quantity'];
        $AddtoCart = $_POST['themgiohang']($id, $quantity); // hàm check catName khi submit lên
        // $insertCart = $ct -> add_to_cart($id, $quantity); 
      
    }   
    

   
    ?>
    <?php
    $customer_id = Session::get('customer_id'); // bỏ $ nha chú , $ là biến chứ không phải thuộc tính 
    //$customer_id = Session::get('$customer_id'); // dòng lỗi ,nản chú ghê,easy vậy mà
       if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wishlist'])){
           // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
           $productid = $_POST['productid'];
           $insertWishlist = $product -> insertWishlist($productid, $customer_id); // hàm check catName khi submit lên
       }
       
    ?>
<div class="main">
    <div class="main_center">
        <?php 
        
        $get_product_details = $product->get_details($id);
        if ($get_product_details) {
            while ($result_details = $get_product_details->fetch_assoc()) {
               
                
        ?>
        <div class="main_center-product_details">
            <div class="main_center-product_details-left">
                <div class="main_center-product_details-left_top ">
                    <div class="details-left_top-item">
                        <img src="admin/uploads/<?php echo $result_details['image'] ?>" alt="">
                    </div>
                    <?php foreach ($img_pro as $key => $value){ ?>
                        <div class="details-left_top-item">
                            <img src="admin/uploads/<?php echo $value['image'] ?>" alt="">
                        </div>
                    <?php 
                    }
                    ?>
                   
                </div>
                <div class="main_center-product_details-left_bottom ">
                    <div class="product_details-left_bottom_slider">
                        <div class="details-left_bottom-item active">
                            <img src="admin/uploads/<?php echo $result_details['image'] ?>" alt="">
                        </div>
                        <?php foreach ($img_pro as $key => $value){ ?>
                            <div class="details-left_bottom-item active">

                                <img src="admin/uploads/<?php echo $value['image'] ?>" alt="">
                            </div>
                        <?php 
                        }
                        ?>
                        
                    </div>
                </div>
            </div>
            <div class="main_center-product_details-right">
                <h2><?php echo $result_details['productName'] ?></h2>
                <p class="price">Giá:<span ><?php echo $fm->format_currency($result_details['price'])." VND" ?></span></p>
                <h3>Mã sản Phẩm:<span><?php echo $result_details['product_code'] ?></span> </h3>
                <h3>Thương hiệu:<span> <?php echo $result_details['brandName'] ?></span></h3>
                <div class="advertisement">
                    <h3>VÌ SAO CHỌN SNEAKER.VN</h3>
                    <p><span><i class="fas fa-check-circle"></i>Cam kết chính hãng 100%</span></p>
                    <p><span><i class="fas fa-check-circle"></i>Miễn phí đổi trả 365 ngày</span></p>
                    <p><span><i class="fas fa-check-circle"></i>Miễn phí bảo hành 1 năm trên toàn hệ thống</span></p>
                    <p><span><i class="fas fa-check-circle"></i>Double box kèm túi chống sốc khi giao hàng</span></p>
                </div>
                <!-- <div class="product_size">
                    <span>Size</span>
                    <select name="size" id="">
                        <option value="">--- Chọn size ---</option>
                        <option value="">40</option>
                        <option value="">41</option>
                        <option value="">42</option>
                        <option value="">43</option>
                        <option value="">44</option>
                    </select>
                </div> -->

                <!-- <div class="add_basket"> -->
                <!-- <span>Số lượng</span>
                <input type="number" name="quantity" placeholder="số lượng..." id=""value="1" min="1">
                    
                </div> -->
                <div class="themgio">
                    <form action="" method="POST">
                        <input type="hidden" name="productid" value="<?php echo $result_details['productId'] ?>"/>
                        <?php
                            $login_check = Session::get('customer_login'); 
                                if($login_check){
                                    
                                    echo '<input type="submit" class="buysubmit" name="wishlist" value="Thêm vào yêu thích" />';
                                }else{
                                    echo '';
                                }
                                    
                            ?>
                    </form>
                    <form action="giohang.php" method="post">

                        <input type="hidden" name="productName" value="<?php echo $result_details['productName'] ?>"  />
                        <input type="hidden" name="productId" value="<?php echo $result_details['productId'] ?>"  />
                        <input type="hidden" name="price" value="<?php echo $result_details['price']?>"  />
                        <input type="hidden" name="image" value="<?php echo $result_details['image']?>"  />
                        <input type="hidden" name="quantity" value="1" />
                        <!-- <input type="hidden" class="buyfield" name="quantity" value="1" min="1" /> -->
                        <input type="submit" class="buysubmits" name="themgiohang" value="Thêm vào giỏ"/>
                        
                    </form>
                    
                    <?php 
                        if (isset($AddtoCart)) {
                            echo $AddtoCart;
                        }
                    ?>	 
                </div>
                <div class="thong_baoTC_TB">
                    <?php 
                        if(isset($insertWishlist)) {
                            echo $insertWishlist;
                        }
                    ?>
                </div>
                
               
            </div>
        </div>
        <div class="main_center-product_mota">
            
            <div class="product_mota_chitiet_heading">
                <h2>Chi tiết sản phẩm</h2>
            </div>
            <div class="product_mota_chitiet_content">
                <div class="product_mota_chitiet_content_dulieu">
                    <p><?php echo $result_details['product_desc'] ?></p>
    
                    
    
                </div>
                <div class="product_mota_chitiet_content_gradient"></div>
            </div>
            <div class="product_mota_chitiet_bottom">
                <div class="product_mota_chitiet_bottom_button">
                    <span class="toggle_text">Xem thêm</span> <span class="arrow">
                    <i class="fas fa-angle-down"></i>
                </div>
            </div>
                    
            
        </div>
        <?php 
	    }
	    }
	    ?>	
    </div>
</div>

<?php include 'module/footer.php'; ?>