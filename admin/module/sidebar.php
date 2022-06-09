<?php 
    include '../lib/session.php';
     Session::checkSession();
 ?>
<div class="wraper_center_main_left">
    <div class="sidebar">
        <div class="account">
            <div class="logo_account">
                <img src="uploads/<?php echo Session::get('imageadmin') ?>" alt="">
                
            </div>
            <div class="lable_account">
                <div class="lable_account_center">
                    <p>ADMIN</p>
                    <p><?php echo Session::get('adminName') ?></p>
                    
                   
                    
            
                </div>
            </div>
            <div class="logout">
                <?php 
                    if(isset($_GET['action']) && $_GET['action']=='logout'){
                        Session::destroy();
                    }
                ?>
                <a href="?action=logout"><span class="fas fa-sign-out-alt"></span></a>
            </div>
            <div class="btn times">
                <span class="fas fa-times"></span>
            </div>
        </div>
        <ul>
            <li class="active"><a href="index.php">Trang chủ</a></li>
            <li>
                <a href="#" class="feat-btn">Danh mục
                <span class="fas fa-caret-down first"></span>
                </a>
                <ul class="feat-show">
                    <li><a href="index.php?action=quanlydanhmucsanpham&query=themdanhmuc">Thêm danh mục</a></li>
                    <li><a href="index.php?action=quanlydanhmucsanpham&query=dsdanhmuc">Danh sách danh mục</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="brand-btn">Thương hiệu
                <span class="fas fa-caret-down Third"></span>
                </a>
                <ul class="brand-show">
                    <li><a href="index.php?action=quanlythuonghieu&query=themthuonghieu">Thêm thương hiêu</a></li>
                    <li><a href="index.php?action=quanlythuonghieu&query=dsthuonghieu">Danh sách thương hiệu</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="serv-btn">Sản phẩm
                <span class="fas fa-caret-down second"></span>
                </a>
                <ul class="serv-show">
                    <li><a href="index.php?action=quanlysanpham&query=themsanpham">Thêm sản phẩm</a></li>
                    <li><a href="index.php?action=quanlysanpham&query=dssanpham">Danh sách sản phẩm</a></li>
                </ul>
            </li>
            
            <li><a href="index.php?action=dsadmin&query=admin">Tài khoản</a></li>
            <li><a href="index.php?action=quanlybanner&query=banner">Quản lí banner</a></li>
            <li><a href="index.php?action=quanlykhohang&query=khohang">Kho hàng</a></li>
            <li><a href="index.php?action=quanlydonhang&query=donhang">Đơn hàng</a></li>
            <li><a href="../index.php " target="_blank">Website</a></li>
        </ul>
    </div>
</div>