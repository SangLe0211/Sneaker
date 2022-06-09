
<?php include '../xulydulieu/xulysanpham.php';  ?>
<?php include '../xulydulieu/xulythuonghieu.php';  ?>
<?php require_once '../helpers/format.php'; ?>
<?php
    // gọi class category
    $pd = new xulysanpham();
    if(!isset($_GET['productid']) || $_GET['productid'] == NULL){
        echo "<script> window.location = 'productlist.php' </script>";
        
    }else {
        $id = $_GET['productid']; // Lấy productid trên host
    } 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $updatemoreProduct = $pd->update_quantity_product($_POST, $_FILES, $id); // hàm check catName khi submit lên
    }
  ?>
<div class="wraper_center_main_right-path">
    <div class="btn">
        <span class="fas fa-bars"></span>
    </div>
    <div class="detailed_path">
        <span><a href="index.php">Trang chủ</a></span>
        <span>/</span>
        <span><a href="index.php?action=quanlykhohang&query=khohang">Kho hàng</a></span>
        <span>/</span>
        <span>Nhập hàng</span>
    </div>
</div>
<div class="wraper_center_main_right-main">
    <div class="wraper_center_main_right-main--center">

        
         <?php 

         $get_product_by_id = $pd->getproductbyId($id);
         if($get_product_by_id){
            while ($result_product = $get_product_by_id->fetch_assoc()) {

        ?> 
        <div class="capnhat_nhaphang">
            <div class="capnhat_nhaphang_heading">
                <h2>Nhập hàng</h2>
                <?php 
                    if(isset($updatemoreProduct)){
                        echo $updatemoreProduct;
                    }
                ?>
            </div>
            <div class="capnhat_nhaphang_content">
                <form action="" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>
                                <label>Tên sản phẩm</label>
                            </td>
                            <td>
                                <input readonly name="productName" value="<?php echo $result_product['productName'] ?>" type="text" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Mã Hàng</label>
                            </td>
                            <td>
                                <input readonly name="product_code" value="<?php echo $result_product['product_code'] ?>" type="text" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Số lượng nhập </label>
                            </td>
                            <td>
                                <input  readonly name="productQuantity" value="<?php echo $result_product['productQuantity'] ?>" type="text" class="medium" />
                            </td>
                        </tr> 
                        <tr>
                            <td>
                                <label>Số lượng tồn</label>
                            </td>
                            <td>
                                <input  readonly name="product_remain" value="<?php echo $result_product['product_remain'] ?>" type="text" class="medium" />
                            </td>
                        </tr> 
                        <tr>
                            <td>
                                <label>Số lượng nhập thêm</label>
                            </td>
                            <td>
                                <input name="product_more_quantity" type="number" placeholder="Nhập thêm số lượng" class="medium" />
                            </td>
                        </tr>  
                        <tr>
                            <td  class="them_soluong_new"> 
                                <a class="tro_lai" href="index.php?action=quanlykhohang&query=khohang"><i class="fa fa-reply"> </i>Trở về</a>
                                <input class="btn_capnhat" type="submit" name="submit" value="Thêm" />
                            </td>
                        </tr>
                    
                    </table>
                </form>
            </div>
        </div>
        
        <?php 
        }
        }
        ?>
       
    </div>
</div>