

<?php  include '../xulydulieu/xulythuonghieu.php'; ?>
<?php
    $brand = new xulythuonghieu(); 
    if(!isset($_GET['idthuonghieu']) || $_GET['idthuonghieu'] == NULL){
        echo "<script> window.location = '?action=quanlythuonghieu&query=dsthuonghieu' </script>";
        
    }else {
        $id = $_GET['idthuonghieu']; // Lấy catid trên host
    }
    // gọi class category
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $tenthuonghieu = $_POST['tenthuonghieu'];
        $update_brand = $brand -> update_brand($tenthuonghieu,$id); // hàm check catName khi submit lên
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
        <span><a href="index.php?action=quanlythuonghieu&query=dsthuonghieu">Ds thương hiệu</a></span>
        <span>/</span>
        <span>Sửa thương hiệu</span>
    </div>
</div>
<div class="wraper_center_main_right-main">
    <div class="wraper_center_main_right-main--center">
        <div class="wraper_center_main_right-main--center_main">
            <form method="POST" action="">
            
                
                <?php 
                    $get_brand_name = $brand->getbrandbyId($id);
                    if($get_brand_name){
                        while ($result = $get_brand_name->fetch_assoc()) {
                            
                        
                ?>
                <div class="header_iteam_form">
                    <div class="header_iteam_heading">
                        <h2>Cập nhật thương hiệu</h2>
                        <?php 
                        if(isset($update_brand)){
                            echo $update_brand;
                        }
                    ?>
                    </div>
                    
                    <div class="header_iteam_top">
                        <label>Tên thương hiệu</label>
                        <input class="input_thuonghieu" type="text" value="<?php echo $result['brandName']; ?>"  
                            name="tenthuonghieu" placeholder="hãy nhập tên thương hiệu">
                        
                    </div>
                    <div class="header_iteam_bottom">
                        <a href="index.php?action=quanlythuonghieu&query=dsthuonghieu">Trở lại</a>
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