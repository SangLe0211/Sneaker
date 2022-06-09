<?php  include '../xulydulieu/xulythuonghieu.php'; ?>
<?php include '../xulydulieu/xulysanpham.php';  ?>
<?php include '../xulydulieu/xuly.php';  ?>
<?php
    if(isset($_GET['productid'])){
        $id = $_GET['productid'];
        $img_pro = mysqli_query($conn, "SELECT * FROM tbl_image_products where id_product = $id");
    }
    ?>
<?php
    // gọi class category
    
    $pd = new xulysanpham();
    if(!isset($_GET['productid']) || $_GET['productid'] == NULL){
        echo "<script> window.location = '?action=quanlysanpham&query=dssanpham' </script>";
           
    } else {
        $id = $_GET['productid']; // Lấy productid trên host
        
        
    } 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $updateProduct = $pd -> update_product($_POST, $_FILES, $id); // hàm check catName khi submit lên
    }
    ?>
<div class="wraper_center_main_right-path">
    <div class="btn">
        <span class="fas fa-bars"></span>
    </div>
    <div class="detailed_path">
    <span><a href="index.php">Trang chủ</a></span>
        <span>/</span>
        <span>Sản phẩm</span>
        <span>/</span>
        <span><a href="index.php?action=quanlysanpham&query=dssanpham">Ds sản phẩm</a></span>
        <span>/</span>
        <span>Sửa sản phẩm</span>
    </div>
</div>
<div class="wraper_center_main_right-main">
    <div class="wraper_center_main_right-main--center main_right-main--center_edit">
        <div class="wraper_center_main_right-main--center_main">
            <div class="thongbao_submit">
                <?php 
                    if(isset($updateProduct)){
                        echo $updateProduct;
                    }
                ?>
                <a href="index.php?action=quanlysanpham&query=dssanpham"><i class="fa fa-reply"> </i>Trở lại</a>
            </div>


            <?php 
                $get_product_by_id = $pd->getproductbyId($id);
                if($get_product_by_id){
                   while ($result_product = $get_product_by_id->fetch_assoc()) {
                    
                   
                 ?>   
            <form method="POST" ole="form" enctype="multipart/form-data">
                <div class="header_iteam">
                    <label>Tên sản phẩm</label>
                    <input type="text" name="productName" value="<?php echo $result_product['productName'] ?>" >
                </div>
                <div class="header_iteam">
                    <label>Mã sản phẩm</label>
                    <input type="text" name="product_code" value="<?php echo $result_product['product_code'] ?>" >
                </div>
                <div class="header_iteam">
                    <label>Số lượng sản phẩm</label>
                    <input type="number"  readonly="readonly" name="productQuantity" value="<?php echo $result_product['productQuantity'] ?>" >
                </div>
                <div class="header_iteam">
                    <label>Danh mục sản phẩm</label>
                    <select id="select" name="category">
                        <option>Select Category</option>
                        <?php 
                            $cat = new xuly();
                            $catlist = $cat->show_category();
                            if($catlist){
                                while ($result = $catlist->fetch_assoc()){
                            
                             ?>
                        <option 
                            <?php 
                                if($result['id_danhmuc']==$result_product['id_danhmuc'])
                                    { echo 'selected'; }
                                 ?> 
                            value=" <?php echo $result['id_danhmuc'] ?> "> <?php echo $result['tendanhmuc'] ?> </option>
                        <?php 
                            }
                             }
                             ?>
                    </select>
                </div>
                <div class="header_iteam">
                    <label>Thương hiệu</label>
                    <select id="select" name="brand">
                        <option>--Chọn thương hiệu--</option>
                        <?php 
                            $brand = new xulythuonghieu();
                            $brandlist = $brand->show_brand();
                            if($brandlist){
                                while ($result = $brandlist->fetch_assoc()){
                            
                             ?>
                        <option
                            <?php 
                                if($result['brandId']==$result_product['brandId'])
                                    { echo 'selected'; }
                                 ?> 
                            value=" <?php echo $result['brandId'] ?> "> <?php echo $result['brandName'] ?> 
                        </option>
                        <?php 
                            }
                             }
                             ?>
                    </select>
                </div>
                <div class="header_iteam sangsang">
                    <label>Mổ Tả</label>
                    <script type="text/javascript">
                        tinymce.init({
                        selector: '#noi_dung',
                        theme: 'modern',
                        height: 400,
                        plugins: [
                            'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                            'save table contextmenu directionality emoticons template paste textcolor jbimages'
                        ],
                        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons jbimages',
                        relative_urls: false
                        });
                        
                        </script>
                    <textarea name="product_desc" id="noi_dung"><?php echo $result_product['product_desc'] ?></textarea>   
                </div>
                <div class="header_iteam">
                    <label>Giá</label>
                    <input type="number" name="price" value="<?php echo $result_product['price'] ?>" >
                </div>
                <div class="header_iteam header_iteam_image">
                    <div class="header_iteam_left">
                        <label>Tải ảnh</label>
                    </div>
                    <div class="header_iteam_right">
                        <img src="uploads/<?php echo $result_product['image'] ?>" width="100" height=""><br>
                        <input type="file" name="image">
                    </div>
                </div>
                <div class="header_iteam header_iteam_images">
                    <div class="header_iteam_left">
                        <label>Tải thư viện</label>
                    </div>
                    <div class="header_iteam_right">
                        <div class="header_iteam_right-input">
                            <input type="file" multiple="multiple" placeholder="Input field" name="images[]">
                        </div>
                        <div class="header_iteam_right-images">
                            <?php foreach ($img_pro as $key => $value){ ?>

                            <div class="right-images-iteams">
                                <img src="uploads/<?php echo $value['image'] ?>" width="100px" height="">
                            </div>

                            <?php 
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="header_iteam">
                    <label>Loại sẩn phẩm</label>
                    <select id="select" name="type">
                        <option>Select Type</option>
                        <?php 
                            if ($result_product['type'] ==0) {
                        ?>
                        <option selected value="0">Sản Phẩm Mới</option>
                        <option  value="1">Gợi ý dành riêng cho bạn</option>
                        
                        <?php 
                        }else{
                        ?>
                        <option  value="0">Sản Phẩm Mới</option>
                        <option selected value="1">Gợi ý dành riêng cho bạn</option>
                        <?php 
                        }
                        ?>
                    </select>
                </div>
                <div class="header_iteam">
                    <div class="clear"></div>
                    <button class="btn_save" name="submit">Cập nhật</button>
                   
                </div>
            </form>
            <?php 
                }
                }
                 ?>
        </div>
    </div>
</div>