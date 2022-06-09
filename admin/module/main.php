
<div class="wraper_center_main_right">
    <?php
        if(isset($_GET['action']) && $_GET['query']){
            $tam = $_GET['action'];
            $query = $_GET['query'];
        }else{
            $tam = '';
            $query = '';
        }
        if($tam=='quanlydanhmucsanpham' && $query=='themdanhmuc'){
            include("module/quanlydanhmucsp/themdanhmuc.php");
        }elseif ($tam=='quanlydanhmucsanpham' && $query=='dsdanhmuc'){
            include("module/quanlydanhmucsp/dsdanhmuc.php");
        }elseif ($tam=='quanlydanhmucsanpham' && $query=='sua'){
            include("module/quanlydanhmucsp/suadanhmuc.php");
            


        }elseif($tam=='quanlysanpham' && $query=='themsanpham'){
            include("module/quanlysanpham/themsanpham.php");
        }elseif($tam=='quanlysanpham' && $query=='dssanpham'){
            include("module/quanlysanpham/danhsachsanpham.php");
        }elseif($tam=='quanlysanpham' && $query=='dstimkiem'){
            include("module/quanlysanpham/ds_timkiem.php");
        }elseif($tam=='quanlysanpham' && $query=='sua'){
            include("module/quanlysanpham/suasanpham.php");



        }elseif($tam=='quanlythuonghieu' && $query=='themthuonghieu'){
            include("module/quanlythuonghieu/themthuonghieu.php");
        }elseif($tam=='quanlythuonghieu' && $query=='dsthuonghieu'){
            include("module/quanlythuonghieu/dsthuonghieu.php");
        }elseif($tam=='quanlythuonghieu' && $query=='suathuonghieu'){
            include("module/quanlythuonghieu/suathuonghieu.php");


        }elseif($tam=='quanlydonhang' && $query=='donhang'){
            include("module/quanlysanpham/donhang.php");
        }elseif($tam=='quanlykhachhang' && $query=='khachhang'){
            include("module/khachhang.php");
        }elseif($tam=='quanlybanner' && $query=='banner'){
            include("module/ds_slider.php");
        }elseif($tam=='quanlybanner' && $query=='add_banner'){
            include("module/them_banner.php");

        }elseif($tam=='quanlykhohang' && $query=='khohang'){
            include("module/quanlysanpham/khohang.php");
        }elseif($tam=='capnhatnhaphang' && $query=='nhaphang'){
            include("module/quanlysanpham/nhaphang.php");

        }elseif($tam=='dsadmin' && $query=='admin'){
            include("module/taikhoan_admin.php");
        }elseif($tam=='addadmin' && $query=='admin'){
            include("module/add_Admin.php");


        } else{
            include("module/home.php");
        }
        
       

    ?> 
    </div>
</div>


