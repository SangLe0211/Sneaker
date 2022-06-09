
<?php  include '../xulydulieu/xulythuonghieu.php'; ?>
<?php include '../xulydulieu/xulysanpham.php';  ?>
<?php include '../xulydulieu/xuly.php';  ?>
<?php
    // gọi class category
    $pd = new xulysanpham(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $insertProduct = $pd -> insert_product($_POST, $_FILES); // hàm check catName khi submit lên
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
        <span>Thêm sản phẩm</span>
    </div>
</div>
<div class="wraper_center_main_right-main">
    <div class="wraper_center_main_right-main--center">
        <div class="wraper_center_main_right-main--center_main">
            <div class="thongbao_submit">
                <?php 
                    if(isset($insertProduct)){
                        echo $insertProduct;
                    }
                ?>
                <a href="index.php?action=quanlysanpham&query=dssanpham"><i class="fa fa-reply"> </i>Trở lại</a>
            </div>
           
            <form method="POST" enctype="multipart/form-data">
                <div class="header_iteam">
                    <label>Tên sản phẩm</label>
                    <input type="text" name="productName" placeholder="Hãy nhập tên sản phẩm...">
                </div>
                <div class="header_iteam">
                    <label>Mã sản phẩm</label>
                    <input type="text" name="product_code" placeholder="Hãy nhập mã sản phẩm...">
                </div>
                <div class="header_iteam">
                    <label>Số lượng sản phẩm</label>
                    <input type="number" name="productQuantity" placeholder="Hãy nhập số lượng sản phẩm...">
                </div>
                <div class="header_iteam">
                    <label>Danh mục sản phẩm</label>
                    <select id="select" name="category">
                            <option>---Chọn chuyên mục---</option>
                            <?php 
                            $cat = new xuly();
                            $catlist = $cat->show_category();
                            if($catlist){
                                while ($result = $catlist->fetch_assoc()){
                            
                             ?>
                            <option value=" <?php echo $result['id_danhmuc'] ?> "> <?php echo $result['tendanhmuc'] ?> </option>
                            
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
                        <option value=" <?php echo $result['brandId'] ?> "> <?php echo $result['brandName'] ?> </option>
                        
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
                    <textarea name="product_desc" id="noi_dung"></textarea>   
                </div>
                <div class="header_iteam">
                    <label>Giá</label>
                    <input type="number" name="price" placeholder="Hãy nhập giá sản phẩm...">
                </div>
                <div class="header_iteam">
                    <label>Tải ảnh</label>
                    <input type="file" name="image">
                </div>
                <div class="header_iteam">
                    <label>Tải thư viện ảnh</label>
                    <input type="file" name="images[]" multiple="multiple" >
                </div>
                <div class="header_iteam">
                    <label>Loại sản phẩm</label>
                    <select id="select" name="type">
                        <option>Chọn</option>
                        <option value="0">Sản phẩm mới</option>                       
                        <option value="1">Dành Riêng Cho Bạn </option>
                    </select>
                </div>
                <div class="header_iteam">
                    <div class="clear"></div>
                    <button class="btn_save" name="submit">Thêm</button>
                </div>
            </form>
       </div>
    </div>
</div>

