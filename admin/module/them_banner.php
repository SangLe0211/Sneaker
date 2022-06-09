
<?php include '../xulydulieu/xulysanpham.php';  ?>

<?php
    // gọi class category
    $product = new xulysanpham(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        
        $insertSlider = $product -> insert_slider($_POST, $_FILES); // hàm check catName khi submit lên
    }
  ?>
<div class="wraper_center_main_right-path">
    <div class="btn">
        <span class="fas fa-bars"></span>
    </div>
    <div class="detailed_path">
        <span><a href="index.php">Trang chủ</a></span>
        <span>/</span>
        <span><a href="index.php?action=quanlybanner&query=banner">Danh sách banner</a></span>
        <span>/</span>
        <span>Thêm banner</span>
    </div>
</div>
<div class="wraper_center_main_right-main">
    <div class="wraper_center_main_right-main--center">
        <div class="wraper_center_main_right-main--center_banner">
                <div class="main--center_banner_content">
                    <div class="main--center_banner_content_heading">
                        <h2>Thêm banner</h2>
                        <?php 
                            if(isset($insertSlider)){
                                echo $insertSlider;
                            }
                        ?>  
                    </div>
                    <div class="main--center_banner_content_main">
                        <form action="index.php?action=quanlybanner&query=add_banner" method="post" enctype="multipart/form-data">
                            <table class="form">     
                                <tr>
                                    <td>
                                        <label>Tên banner</label>
                                    </td>
                                    <td>
                                        <input type="text" name="sliderName" placeholder="Enter Slider Title..." class="medium" />
                                    </td>
                                </tr>           
                    
                                <tr>
                                    <td>
                                        <label>Tải ảnh lên</label>
                                    </td>
                                    <td>
                                        <input type="file" name="image"/>
                                    </td>
                                </tr>
    
                                <tr>
                                    <td>
                                        <label>Hiển thị</label>
                                    </td>
                                    <td>
                                        <select name="type">
                                            <option>--- Chọn ---</option>    
                                            <option value="1">Hiển thị</option>    
                                            <option value="0">Ẩn</option> 
                                        </select>
                                    </td>
                                </tr>
                            
                                <tr>
                                   
                                    <td colspan="2">
                                        <div class="banner_content_main_btn">
                                            <a href="index.php?action=quanlybanner&query=banner">Trở lại</a>
                                            <input class="main_btn_add" type="submit" name ="submit" value="Thêm">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </form>
       </div>
    </div>
</div>