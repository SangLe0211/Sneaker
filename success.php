<?php include 'module/header.php'; ?>
</div>
<?php 
	if(isset($_GET['oderid']) AND $_GET['orderid'] == 'order'){
        $customer_id = Session::get('customer_id');
        $insertOrder = $ct->insertOrder($customer_id);
        $delCart = $ct->del_all_data_cart();
        header('Location:success.php');
    }
 ?>
<div class="main products">
    <div class="main_center_products">
        <div class="main_center_products_all-productss">
            <form class="productss_form_thanhcong" action="" method="POST">
                    <h2>Đặt hàng thành công</h2>
                    <?php
                        $customer_id = Session::get('customer_id'); 
                        $get_amount = $ct->getAmountPrice($customer_id);
                        if ($get_amount) {
                            $amount = 0;
                            while ($result = $get_amount->fetch_assoc()) {
                                $price = $result['price'];
                                $amount += $price;
                            }
                        }
                    ?>
                    <p class="">Tổng giá trị bạn cần thanh toán khi nhận hàng là: <?php 
                        $vat = $amount * 0;
                        $total = $vat + $amount;
                        echo $fm->format_currency($total).' VNĐ';
                    ?></p>
                    <p class="">Chúng tôi sẽ liên hệ với bạn sớm nhất có thể</p> 
                    <p>Xem chi tiết đặt hàng tại </p>
                    <a href="orderdetails.php"><i class="fa fa-reply"> </i>Bấm vào đây</a>
               
            </form>
        </div>
    </div>
</div>
<?php include 'module/footer.php'; ?>