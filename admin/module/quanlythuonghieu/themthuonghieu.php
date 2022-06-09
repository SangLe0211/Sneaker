<?php  include '../xulydulieu/xulythuonghieu.php'; ?>
<?php
   
    // gọi class category
    $cat = new xulythuonghieu(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $tenthuonghieu = $_POST['tenthuonghieu'];
        $insertCat = $cat -> insert_brand($tenthuonghieu); 
       
    }
?>
<div class="wraper_center_main_right-path">
    <div class="btn">
        <span class="fas fa-bars"></span>
    </div>
    <div class="detailed_path">
        <span><a href="index.php">Trang chủ</a></span>
        <span>/</span>
        <span>Thương hiệu</span>
        <span>/</span>
        <span>Thêm thương hiệu</span>
    </div>
</div>
<div class="wraper_center_main_right-main">
    <div class="wraper_center_main_right-main--center">
        <div class="wraper_center_main_right-main--center_main">
            <form method="POST" action="?action=quanlythuonghieu&query=themthuonghieu">
                <div class="header_iteam_form">
                    <div class="header_iteam_heading">
                        <h2>Thêm thương hiệu</h2>
                        <?php 
                            if(isset($insertCat)){
                                echo $insertCat;
                            }
                        ?>
                    </div>
                    <div class="header_iteam_top">
                        <label>Tên thương hiệu</label>
                        <input class="input_thuonghieu" type="text" name="tenthuonghieu" required="" placeholder="Hãy nhập tên thương hiệu...">
                    </div>
                    <div class="header_iteam_bottom">
                        <a href="index.php?action=quanlythuonghieu&query=dsthuonghieu">Trở lại</a>
                        <input type="submit" name ="themthuonghieu" value="Thêm">
                    </div>
                </div>
            </form>
       </div>
    </div>
</div>
