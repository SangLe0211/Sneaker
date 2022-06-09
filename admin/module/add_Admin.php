
<?php include '../xulydulieu/xulysanpham.php';  ?>

<?php
    // gọi class category
    $pd = new xulysanpham(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $insertProduct = $pd -> insert_admin($_POST, $_FILES); // hàm check catName khi submit lên
    }
  ?>
<div class="wraper_center_main_right-path">
    <div class="btn">
        <span class="fas fa-bars"></span>
    </div>
    <div class="detailed_path">
        <span><a href="index.php">Trang chủ</a></span>
        <span>/</span>
        <span><a href="index.php?action=dsadmin&query=admin">Danh sách admin</a></span>
        <span>/</span>
        <span>Thêm admin</span>
    </div>
</div>
<div class="wraper_center_main_right-main">
    <div class="wraper_center_main_right-main--center">
        <div class="wraper_center_main_right-main--center_banner">
                <div class="main--center_banner_content">
                    <div class="main--center_banner_content_heading">
                        <h2>Thêm admin</h2>
                        <?php 
                            if(isset($insert_admin)){
                                echo $insert_admin;
                            }
                        ?>  
                    </div>
                    <div class="main--center_banner_content_main">
                        <form action="index.php?action=addadmin&query=admin" method="post" enctype="multipart/form-data">
                            <table class="form">     
                                <tr>
                                    <td>
                                        <label>Họ và tên</label>
                                    </td>
                                    <td>
                                        <input type="text" name="adminName" placeholder="Nhập họ và tên..." class="medium" />
                                    </td>
                                </tr>           
                                <tr>
                                    <td>
                                        <label>Email</label>
                                    </td>
                                    <td>
                                        <input type="text" name="adminEmail" placeholder="Nhập email..." class="medium" />
                                    </td>
                                </tr>           
                                <tr>
                                    <td>
                                        <label>Tên đăng nhập</label>
                                    </td>
                                    <td>
                                        <input type="text" name="adminUser" placeholder="Nhập tên đăng nhập..." class="medium" />
                                    </td>
                                </tr>           
                                <tr>
                                    <td>
                                        <label>Mật khẩu</label>
                                    </td>
                                    <td>
                                        <input type="text" name="adminPass" placeholder="Nhập mật khẩu..." class="medium" />
                                    </td>
                                </tr>           
                    
                                <tr>
                                    <td>
                                        <label>Tải ảnh admin</label>
                                    </td>
                                    <td>
                                        <input type="file" name="imageadmin"/>
                                    </td>
                                </tr>
    
                                <tr>
                                    <td>
                                        <label>Hiển thị</label>
                                    </td>
                                    <td>
                                        <select name="level">
                                            <option>--- Chọn ---</option>    
                                            <option value="0">Giám đốc</option>    
                                            <option value="1">Nhân viên</option> 
                                        </select>
                                    </td>
                                </tr>
                            
                                <tr>
                                   
                                    <td colspan="2">
                                        <div class="banner_content_main_btn">
                                            <a href="index.php?action=dsadmin&query=admin">Trở lại</a>
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