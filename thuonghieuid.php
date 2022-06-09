<?php include 'module/header.php'; ?> 
</div>
<?php
  if(!isset($_GET['idthuonghieu']) || $_GET['idthuonghieu'] == NULL){
      // echo "<script> window.location = 'sanpham.php' </script>";
      
  }else {
      $id = $_GET['idthuonghieu']; // Lấy catid trên host
  }
  // $query = "SELECT tbl_sanpham.*, tbl_thuonghieu.brandName  FROM tbl_sanpham JOIN tbl_thuonghieu
  //           ON tbl_sanpham.brandId = tbl_thuonghieu.brandId  where tbl_thuonghieu.brandId = '$id' order by productId desc LIMIT 8 ";
    
    $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:12;
    $current_page =!empty($_GET['page'])?$_GET['page']:1;
    $offset = ($current_page - 1) * $item_per_page;
    $query = mysqli_query($conn,"SELECT tbl_sanpham.*, tbl_thuonghieu.brandName  FROM tbl_sanpham JOIN tbl_thuonghieu
                          ON tbl_sanpham.brandId = tbl_thuonghieu.brandId  where tbl_thuonghieu.brandId = '$id' order by productId desc LIMIT ".$item_per_page." OFFSET ".$offset."") ;
    $totalRecords = mysqli_query($conn, "SELECT tbl_sanpham.*, tbl_thuonghieu.brandName  FROM tbl_sanpham JOIN tbl_thuonghieu
                                ON tbl_sanpham.brandId = tbl_thuonghieu.brandId  where tbl_thuonghieu.brandId = '$id'");
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
  //  $result = $this->db->select($query);  
  //  return $result;

?>
     
<div class="main products">
    <div class="main_center_products">
      <div class="main_center_products-path">
        <div class="main_center_products-path_center">
            <li><a href="index.php">Trang chủ</a></li>
            <span>/</span>
            <li><a href="#">Thương hiệu</a></li>
            <span>/</span>
            <?php 
                $name_brand = $brand->get_name_by_brand($id);
                if ($name_brand) {
                    while ($result_name = $name_brand->fetch_assoc()) {
                        # code...
            ?>
            <li><a href="#"><?php echo $result_name['brandName'] ; ?></a></li>
            <?php 
            }
            }
            ?>
        </div>
      </div>
      <div class="main_center_products_all-products">
          <div class="main_center_products_all-products_left">
            <div class="thuonghieu">
              <span>Thương hiệu</span>
              <ul>
                <?php 
                  $getall_brand = $brand->show_thuonghieu_web();
                      if ($getall_brand) {
                          while ($result_allbrand = $getall_brand->fetch_assoc()) {
                ?>
                <li ><a href="thuonghieuid.php?idthuonghieu=<?php echo $result_allbrand['brandId'] ?>"><?php echo $result_allbrand['brandName'] ?></a></li>
                <?php 
                    }
                    }
                ?>
               
              </ul>
            </div>
          </div>
        
          <div class="main_center_products_all-products_right">
            <div class="main_center_products_all-products_right_content">
            <?php 
                $name_brand = $brand->get_name_by_brand($id);
                if ($name_brand) {
                    while ($result_name = $name_brand->fetch_assoc()) {
                        # code...
            ?>
            <div class="product_content-heading">
                <h2><?php echo $result_name['brandName'] ; ?> </h2>
            </div>
            <?php 
            }
            }
            ?>

              <div class="product_content-detail_right">
              <?php 
                // $productbycat = $brand->get_product_by_cat($id);
                // if ($productbycat) {
                    // while ($result = $productbycat->fetch_assoc()) {
                      while ($result = mysqli_fetch_array($query)) {
                        # code...
              ?>
                  <div class="produce-item">
                        <div class="produce-item_image">
                          <a href="product_details.php?proid=<?php echo $result['productId'] ?>">
                            <img src="admin/uploads/<?php echo $result['image'] ?>" alt="">
                            <div class="buy_now buy_now_small">
                              <a class="" href="product_details.php?proid=<?php echo $result['productId'] ?>">Click để xem chi tiết</a>
                            <button class="btn_chitiet btn_chitiet_small"><a href="product_details.php?proid=<?php echo $result['productId'] ?>">Mua ngay</a> </button>
                          </div>
                          </a>
                        </div>
                        <a href="product_details.php?proid=<?php echo $result['productId'] ?>">
                            <div class="produce-item_lable">
                                <h3><?php echo $fm->textShortenn($result['brandName'], 25) ?></h3>
                                <h4><?php echo $fm->textShorten($result['productName'], 45) ?></h4>
                                <span><?php echo $fm->format_currency($result['price'])." VND" ?></span>
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
                include './xulydulieu/phantrang_thuonghieu.php';
              ?>
            </div>
           
          </div>
          
      </div>
      
    </div>
   
</div>



<?php include 'module/footer.php'; ?>