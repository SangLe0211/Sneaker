<?php include '../xulydulieu/khachhang.php';  ?>
<?php
    $cs = new khachhang(); 
    if(!isset($_GET['customerid']) || $_GET['customerid'] == NULL){
        echo "<script> window.location = 'inbox.php' </script>";
        
    }else {
        $id = $_GET['customerid']; // Lấy catid trên host
    }
    
    
    
  ?>
<div class="wraper_center_main_right-path">
    <div class="btn">
        <span class="fas fa-bars"></span>
    </div>
    <div class="detailed_path">
        <span><a href="index.php">Trang chủ</a></span>
        <span>/</span>
        <span><a href="index.php?action=quanlydonhang&query=donhang">Đơn hàng</a></span>
        <span>/</span>
        <span>Thông tin</span>
    </div>
</div>
<div class="wraper_center_main_right-main">
    <div class="wraper_center_main_right-main--center">
        <div class="wraper_center_main_right-main--center_main">
            <?php 
                $get_customer = $cs->show_customers($id);
                if($get_customer){
                    while ($result = $get_customer->fetch_assoc()) {  
            ?>
            <div class="khach_hang">
                <div class="khach_hang_heading">
                    <h2>THÔNG TIN KHÁCH HÀNG</h2>
                </div>
                <form  action="" method="post">
                    <table >
                        <tr>
                            <td>Tên khách hàng</td>
                            <td><input type="text" readonly="readonly" value="<?php echo $result['name']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td><input type="text" readonly="readonly" value="<?php echo $result['phone']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" readonly="readonly" value=" <?php echo $result['email']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Thành phố</td>
                            <td><input type="text" readonly="readonly" value="<?php echo $result['city']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td><input type="text" readonly="readonly" value=" <?php echo $result['address']; ?>"></td>
                        </tr>
                    </table>
                </form>
                <div class="btn_trolai">

                    <a href="index.php?action=quanlydonhang&query=donhang" class="tro_lai">Trở lại</a>
                </div>
            </div>
            <?php 
                }
                }
            ?>
       </div>
    </div>
</div>