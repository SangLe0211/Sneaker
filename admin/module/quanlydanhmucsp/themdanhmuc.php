
<?php include '../xulydulieu/xuly.php';  ?>
<?php
    // gọi class category
    $cat = new xuly(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $tendanhmuc = $_POST['tendanhmuc'];
      
        $insertCat = $cat -> insert_category($tendanhmuc); 
       
    }
  ?>


<div class="wraper_center_main_right-path">
    <div class="btn">
        <span class="fas fa-bars"></span>
    </div>
    <div class="detailed_path">
        <span><a href="index.php">Trang chủ</a></span>
        <span>/</span>
        <span>Danh mục</span>
        <span>/</span>
        <span>Thêm danh mục</span>
    </div>
</div>
<div class="wraper_center_main_right-main">
    <div class="wraper_center_main_right-main--center">
        <div class="wraper_center_main_right-main--center_main">
            <form method="POST" action="?action=quanlydanhmucsanpham&query=themdanhmuc">
                
                <div class="header_iteam_form">
                    <div class="header_iteam_heading">
                        <h2>Thêm danh mục</h2>
                        <?php 
                            if(isset($insertCat)){
                                echo $insertCat;
                            }
                        ?>
                    </div>
                    <div class="header_iteam_top">
                        <label>Tên danh mục</label>
                        <input class="input_thuonghieu" type="text" name="tendanhmuc" required="" placeholder="Hãy nhập tên danh mục">
                    </div>
                    <div class="header_iteam_bottom">
                        <a href="index.php?action=quanlydanhmucsanpham&query=dsdanhmuc">Trở lại</a>
                        <input type="submit" name ="themdanhmuc" value="Thêm">
                    </div>
                </div>
            </form>
       </div>
    </div>
</div>