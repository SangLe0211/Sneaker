<?php include 'module/header.php'; ?>
</div>

    <?php
        if(isset($_POST['themgiohang'])){
            $customer_id = Session::get('customer_id');
            $productName = $_POST['productName'];
            $id = $_POST['productId'];
            $price = $_POST['price'];
            $image = $_POST['image'];
            $quantity = $_POST['quantity'];
            $sId = session_id();
            $sql_giohang = mysqli_query($conn, "SELECT * FROM tbl_giohang WHERE productId = '$id'");
            $count_giohang = mysqli_num_rows($sql_giohang);
            if($count_giohang>0){
                $row_sanpham = mysqli_fetch_array( $sql_giohang);
                $soluong = $row_sanpham['quantity'] +1;
                $sql_giohang = "UPDATE tbl_giohang SET quantity='$soluong' WHERE productId='$id'";
            }else{
                $soluong = $quantity;
                $sql_giohang = "INSERT INTO tbl_giohang(productId, productName,sId,customer_id,price, quantity,image) VALUES ('$id','$productName','$sId','$customer_id','$price','$quantity','$image')";
                // var_dump($sql_giohang); die();
            }   
            $insert_row = mysqli_query($conn, $sql_giohang);
            // if($insert_row==0){
            //     header('Location:product_details.php?proid='.$id);
            // }
            
            // if($insert_cart){
            //     $msg = " them thanh cong ";
            //     return $msg;
            // }else {
            //     header('Location:index.php');
            // }
        }
        
      
    
    ?>
   <?php
      $sId = session_id();
      $customer_id = Session::get('customer_id');
         $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:8;
         $current_page =!empty($_GET['page'])?$_GET['page']:1;
         $offset = ($current_page - 1) * $item_per_page;
         $queryy = mysqli_query($conn,"SELECT * FROM tbl_giohang WHERE customer_id = '$customer_id' order by cartId   desc LIMIT ".$item_per_page." OFFSET ".$offset.	"") ;
         $totalRecords = mysqli_query($conn, "SELECT * FROM tbl_giohang ");
         $totalRecords = $totalRecords->num_rows;
         $totalPages = ceil($totalRecords / $item_per_page);
   ?>
    <?php
    if(isset($_GET['cartid'])){
        $cartid = $_GET['cartid']; 
        $delcart = $ct->del_product_cart($cartid);
    }
        
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $cartId = $_POST['cartId'];
        $proId = $_POST['proId'];
        $quantity = $_POST['quantity'];
        $update_quantity_Cart = $ct -> update_quantity_Cart($proId,$cartId, $quantity); // hàm check catName khi submit lên
    	if ($quantity <= 0) {
    		$delcart = $ct->del_product_cart($cartId);
    	}
    } 
    ?>
     <?php
        if(!isset($_GET['id'])){
            echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
        }
    ?>
<div class="main products">
    <div class="main_center_products">
        <div class="main_center_products-path">
            <div class="main_center_products-path_center">
                <li><a href="index.php">Trang chủ</a></li>
                <span>/</span>
                <li><a href="giohang.php">Giỏ hàng</a></li>
            </div>
        </div>
        <div class="product_content-heading">
            <h2>Giỏ hàng của bạn</h2>
            <?php 
                if (isset($update_quantity_Cart)) {
                    echo $update_quantity_Cart;
                }
                ?>
               
        </div>
        <div class="main_center_products-table">
                <?php
                    $check_cart = $ct->check_cart($customer_id);
                    if ($check_cart) {
                ?>
            <table class="table sanpham">
                <tr>
                    <th>Stt</th>
                    <th>Hình ảnh sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số Lượng</th>
                    <th>Tổng giá</th>
                    <th>Xử lý</th>
                </tr>
                
                <?php 
                    // $get_product_cart = $ct->get_product_cart();
                    // if($get_product_cart){
                        $i = 0;
                        $subtotal = 0;
                        $qty = 0;
                        while ($result = mysqli_fetch_array($queryy)) {
                            $i++;
                    ?>
                <tr>
                    <td><?php echo $i  ?></td>
                    <td><a href="product_details.php?proid=<?php echo $result['productId'] ?>"><img src="admin/uploads/<?php echo $result['image']?>" alt=""/></a></td>
                    <td><a href="product_details.php?proid=<?php echo $result['productId'] ?>"><?php echo $result['productName'] ?></a></td>
                    <td><?php echo $fm->format_currency($result['price'])." VND" ?></td>
                    <td>
                        <form class="update_soluong" action="" method="post">
                            <input type="hidden" name="cartId" min="0" value="<?php echo $result['cartId'] ?>"/>
                            <input type="hidden" name="proId" min="0" value="<?php echo $result['productId'] ?>"/>
                            <input type="number" name="quantity" min="0" value="<?php echo $result['quantity'] ?>"/>
                            <input type="submit" name="submit" value="Update"/>
                        </form>
                    </td>
                    <td>
                        <?php 
                            $total = $result['price'] * $result['quantity'];
                            echo $fm->format_currency($total)." VND";
                            ?>
                    </td>
                    <td>
                        <div class="xuly_chung">
                            <!-- <div class="xuly xuly_update">
                            <form action="" method="post">
                                <input type="submit" name="capnhatgiohang" value="Update"/>
                            </form>
                            </div> -->
                            <div class="xuly xuly_delete">
                                <a onclick = "return confirm('Are you want to delete <?php echo $result['productName']  ?>???')"
                                    href="?cartid=<?php echo $result['cartId'] ?>">Xóa</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php 
                // }
                $subtotal += $total;
                $qty = $qty + $result['quantity'];
                }
                ?>
                
                <tr class="thanh_toan">
                    <td colspan="5" class="thanh_toan_heading">Tổng cộng: </td>
                    <td colspan="2" class="thanh_toan_money">
                    
                    <?php echo $fm->format_currency($subtotal)." VND";

                        Session::set('sum',$subtotal);
                        Session::set('qty',$qty);
                    ?>
                    </td>
                    
                </tr>
                
                
            </table>
               
            <div class="shopping">
                <div class="shopping_button shopping_left">
                    <a href="sanpham.php"><i class="fa fa-reply"> </i> Tiếp tục mua hàng</a>
                </div>
                <div class="shopping_button shopping_right">
                    <a href="offlinepayment.php"> Thanh toán <i class="far fa-share"></i></a>
                </div>
                
            </div>
            <?php include './xulydulieu/phantrang.php';  ?>
            <?php 
                }else {
                    echo'
                        <div class="thongbao">
                            <h3>Giỏ của bạn trống trơn ! Hãy mua sắm ngay bây giờ</h3>
                            <div class="thongbao_button">
                                <a href="sanpham.php"> <i class="fa fa-reply"> </i>Tiếp tục mua hàng</a>
                            </div>
                        </div>
                    ';
                }
            ?>
        </div>  
    </div>
</div>
<?php include 'module/footer.php'; ?>