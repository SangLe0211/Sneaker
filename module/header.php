<?php
    include 'lib/session.php';
    Session::init();
    ?>
<?php
    include 'lib/database.php';
    include 'helpers/format.php ';
    
    spl_autoload_register(function($class){
    	include_once "xulydulieu/".$class.".php";
    });
    	
    
    $db = new Database();
    $fm = new Format();
    $ct = new giohang();
    // $us = new user();
    $cs = new khachhang();
    // $cat = new category();
    $brand = new xulythuonghieu();
    $product = new xulysanpham();
    $thuonghieu = new xulythuonghieu();     
    ?>

<?php
    header("Cache-Control: no-cache, must-revalidate");
    header("Pragma: no-cache"); 
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
    header("Cache-Control: max-age=2592000");
    ?>
<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sneaker&Sneaker</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet"/>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>

    <div class="wrapper">
        <div class="wrapper__center">
            
            <div class="header">
                <div class="header_top">
                    <div class="header_top_center">
                        <div class="header_top_center_left">
                            <a href="index.php" class="logo">SNEAKER</a>
                        </div>
                        <div class="header_top_center_center">
                            <div class="header_top_center_center_heading">
                                <div class="main_menu_btn">
                                        <span class="fas fa-times"></span>
                                    </div>
                                <h2>Sneaker</h2>
                            </div>
                            <ul class="main_menu">
                                <li class="actives"><a  href="index.php" >Trang chủ</a></li>
                                <li><a href="sanpham.php">Sản Phẩm</a></li>
                                
                                 <!-- <?php 
                                    // $login_check = Session::get('customer_login');
                                    // if ($login_check==false) {
                                    //     echo '';
                                    // }else {
                                    //     echo '<li><a href="orderdetails.php">Đơn hàng</a></li>'; 
                                    // }
                                ?> -->
                                <li><a class="serv-btn" href="#">Thương hiệu
                                        <span class="fas fa-caret-down second"></span>
                                    </a>
                                    <ul class="sub_menu">
                                        <?php 
                                            $getall_brand = $brand->show_thuonghieu_web();
                                                if ($getall_brand) {
                                                    while ($result_allbrand = $getall_brand->fetch_assoc()) {
                                                        
                                                    
                                            ?>
                                        <li><a href="thuonghieuid.php?idthuonghieu=<?php echo $result_allbrand['brandId'] ?>"><?php echo $result_allbrand['brandName'] ?></a></li>
                                        <?php 
                                            }
                                            }
                                        ?>
                                    </ul>
                                </li>
                                <li><a href="lienhe.php">Liên hệ</a></li>
                            </ul>
                        </div>
                        <div class="header_top_center_right">
                            <ul class="main_menu">
                                <li>
                                    <span class = "btn_open_search"href=""><i class="fas fa-search"></i></i></span>
                                    <div class="modal_search hide">
                                        <div class="modal_search_inner">
                                            <form action="timkiem.php" method="POST">
                                                <input class="input_search" type="text" name="tukhoa" placeholder="Tìm kiếm sản phẩm..." >
                                                <input class="btn_search" type="submit" name="timkiem"  value="&#xf002;">
                                               
                                            </form>
                                        </div>
                                    </div> 
                                </li>
                                    
                                
                                <li>
                                    <a class="gio" href="giohang.php">
                                        <i class="fas fa-shopping-cart"></i>
                                        <div class="soluong">
                                            <?php
                                            $customer_id = Session::get('customer_id');
                                                $check_cart = $ct ->check_cart($customer_id);
                                                if($check_cart){
                                                    $qty  = Session::get("qty");
                                                    echo $qty;
                                                }else{
                                                    echo '0';
                                                }
                                            ?>
                                        </div>
                                    </a>
                                </li>
                                    <?php
                                        if(isset($_GET['customer_id'])){
                                            // $delCart = $ct->del_all_data_cart();
                                            Session::destroy();
                                        }
                                    ?>
                                <li>
                                    
                                    <?php 
                                    $login_check = Session::get('customer_login');
                                    if ($login_check==false) {
                                        echo '
                                        <div class="main_menu_login">
                                            <a class= "login" href="login.php">Đăng Nhập </a>
                                        </div>'; 
                                    }else {
                                        
                                        echo '
                                            <span class = "btn_open"href=""><i class="far fa-user"></i></span>
                                            <div class="modal hide">
                                                <div class="modal__inner">
                                                    <div class="modal__header">
                                                        <i class="fas fa-times"></i>
                                                    </div>
                                                    <div class="modal__body">
                                                        <div class="modal__body_content">
                                                            <p><a href="thongtin.php">Tài khoản</a></p> 
                                                            <p><a href="orderdetails.php">Đơn hàng</a></p>
                                                            <p><a href="sanpham_yeuthich.php">Yêu thích</a></p>
                                                            <p><a href="?customer_id='.Session::get('customer_id').' ">Đăng xuất</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                            
                                        ';
                                    }
                                    ?>
                                    
                                </li>
                                <li class="btn_sidebar">
                                    <div class="main_menu_btn">
                                        <span class="fas fa-bars"></span>
                                    </div>
                                </li>
                            </ul>
    
                        </div>
                    </div>
                </div>

                
                

           