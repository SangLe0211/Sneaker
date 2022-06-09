<?php include '../xulydulieu/xuly.php';  ?>

<?php
    $cat = new xuly(); 
    if(!isset($_GET['iddanhmuc']) || $_GET['iddanhmuc'] == NULL){
        echo "<script> window.location = '?action=quanlydanhmucsanpham&query=dsdanhmuc' </script>";
        
    }else {
        $id = $_GET['iddanhmuc']; // Lấy catid trên host
    }
    // gọi class category
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $tendanhmuc = $_POST['tendanhmuc'];
    
        $updateCat = $cat -> update_category($tendanhmuc,$id); // hàm check catName khi submit lên
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
        <span><a href="index.php?action=quanlydanhmucsanpham&query=dsdanhmuc">DS danh mục</a></span>
        <span>/</span>
        <span>Sửa danh mục</span>
    </div>
</div>
<div class="wraper_center_main_right-main">
    <div class="wraper_center_main_right-main--center">
        <div class="wraper_center_main_right-main--center_main">
            <form method="POST" action="">
                <!-- <?php
                    // while($dong = mysqli_fetch_array($query_suadanhmuc_sp)){
                ?> -->
            
                
                <?php 
                    $get_cat_name = $cat->getcatbyId($id);
                    if($get_cat_name){
                        while ($result = $get_cat_name->fetch_assoc()) {
                            
                        
                ?>
                <div class="header_iteam_form">
                    <div class="header_iteam_heading">
                        <h2>Cập nhật danh mục</h2>
                        <?php 
                            if(isset($updateCat)){
                                echo $updateCat;
                            }
                        ?>
                    </div>
                    <div class="header_iteam_top">
                        <label>Tên danh mục</label>
                        <input class="input_thuonghieu" type="text" value="<?php echo $result['tendanhmuc']; ?>"  name="tendanhmuc" placeholder="Hãy nhập tên danh mục">
                    </div>
                    <div class="header_iteam_bottom">
                        <a href="index.php?action=quanlydanhmucsanpham&query=dsdanhmuc">Trở lại</a>
                        <input type="submit" name ="submit" value="Cập nhật">
                    </div>
                </div>
                <?php
                    }
                }
                ?>
            </form>
       </div>
    </div>
</div>