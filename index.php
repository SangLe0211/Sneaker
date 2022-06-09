<?php include 'module/header.php'; ?>
<?php include 'module/banner.php'; ?>   

</div>
<div class="main">
    <div class="main_center">
        <div class="main_center-policy_content slideanim">
            <div class="policy_item">
                <div class="policy_desc">
                    <h2>ĐỔI TRẢ MIỄN PHÍ</h2>
                    <span>Đổi trả trong vòng 365 ngày đối với bất kỳ lỗi sản phẩm nào khi nhận hàng</span>
                </div>
            </div>
            <div class="policy_item">
                <div class="policy_desc">
                    <h2>DỊCH VỤ TỪ A-Z</h2>
                    <span>Trả hàng hoàn tiền và có bưu tá lấy hàng tận nơi khi khách hàng yêu cầu đối trả</span>
                </div>
            </div>
            <div class="policy_item">
                <div class="policy_desc">
                    <h2>FREESHIP TẬN NHÀ</h2>
                    <span>Mọi đơn hàng được Miễn phí ship trên toàn quốc với Hóa đơn từ 500K</span>
                </div>
            </div>
            <div class="policy_item">
                <div class="policy_desc">
                    <h2>UY TÍN HÀNG ĐẦU</h2>
                    <span>Cam kết đem đến sản phẩm giá tốt nhất thị trường với chất lượng tốt nhất</span>
                </div>
            </div>
        </div>
        <div class="main_center-product_content ">
            <div class="product_content-heading slideanim">
                <h2>Sản phẩm mới</h2>
                <a href="sanpham.php">Xem tất cả</a>
            </div>
            <div class="product_content-detail slideanim">
                <?php 
                    $product_new = $product->getSan_Pham_moi();
                    if($product_new){
                        while ($result_new = $product_new->fetch_assoc()) {
                ?>
                <div class="produce-item">
                    <div class="produce-item_image">
                        <a href="product_details.php?proid=<?php echo $result_new['productId'] ?>"><img src="admin/uploads/<?php echo $result_new['image'] ?>" alt=""></a>
                        <div class="buy_now">
                            <a href="product_details.php?proid=<?php echo $result_new['productId'] ?>">Click để xem chi tiết</a>
                            <button class="btn_chitiet"><a href="product_details.php?proid=<?php echo $result_new['productId'] ?>">Mua ngay</a> </button>
                        </div>
                    </div>
                    <a href="product_details.php?proid=<?php echo $result_new['productId'] ?>">
                        <div class="produce-item_lable">
                            <h3><?php echo $fm->textShortenn($result_new['brandName'], 25) ?></h3>
                            <h4><?php echo $fm->textShorten($result_new['productName'], 45) ?></h4>
                            <span><?php echo $fm->format_currency($result_new['price'])." VND" ?></span>
                        </div>
                    </a>
                </div>
                <?php 
                }
                }
                ?>
                
            </div>
        </div>
        <div class="main_center-product_content " >
            <div class="product_content-heading goiy slideanim">
                <h2>Gợi ý cho bạn</h2>
                <a href="goi_y_cho_ban.php">Xem tất cả</a>
            </div>
            <div class="product_content-detail slideanim">
            <?php 
                    $product_new = $product->getSan_Pham_goi_y();
                    if($product_new){
                        while ($result_new = $product_new->fetch_assoc()) {
                ?>
                <div class="produce-item">
                    <div class="produce-item_image">
                        <a href="product_details.php?proid=<?php echo $result_new['productId'] ?>"><img src="admin/uploads/<?php echo $result_new['image'] ?>" alt=""></a> 
                        <div class="buy_now">
                            <a href="product_details.php?proid=<?php echo $result_new['productId'] ?>">Click để xem chi tiết</a>
                            <button class="btn_chitiet"><a href="product_details.php?proid=<?php echo $result_new['productId'] ?>">Mua ngay</a> </button>
                        </div>
                    </div>
                    <a href="product_details.php?proid=<?php echo $result_new['productId'] ?>">
                        <div class="produce-item_lable">
                            <h3><?php echo $fm->textShortenn($result_new['brandName'], 25) ?></h3>
                            <h4><?php echo $fm->textShorten($result_new['productName'], 45) ?></h4>
                            <span><?php echo $fm->format_currency($result_new['price'])." VND" ?></span>
                        </div>
                    </a>
                </div>
                <?php 
                }
                }
                ?>
            </div>
        </div>
        <div class="main_center-product_trademark ">
            <div class="main_center-product_trademark-heading slideanim">
                <h2>Thương hiệu nổi bật</h2>
            </div>
            <div class="main_center-product_trademark-content">
                <div class="main_center-product_trademark-content_tab slideanim">
                   <li class="active">Nike</li>
                   <li id="Adidas">Adidas</li>
                   <li>Vans</li>
                   <li>Balenciaga</li>
                </div>
                <div class="main_center-product_trademark-content_product slideanim">
                    <div  class="trademark-content_product-item nike">
                        <div class="trademark-content_product-item_left">
                            <img src="admin/uploads/thuonghieu/nike6.jpg" alt="">
                        </div>
                        <div class="trademark-content_product-item_right">
                            <?php 
                                $product_thuonghieu = $product->get_thuonghieu_nike();
                                if($product_thuonghieu){
                                    while ($result_thuonghieu = $product_thuonghieu->fetch_assoc()) {
                            ?>
                            <div class="trademark-content_product-item_right-item">
                                <div class="trademark_item_image">
                                    <a href="product_details.php?proid=<?php echo $result_thuonghieu['productId'] ?>">
                                        <img src="admin/uploads/<?php echo $result_thuonghieu['image'] ?>" alt="">
                                        <div class="buy_now">
                                            <a href="product_details.php?proid=<?php echo $result_thuonghieu['productId'] ?>">Click để xem chi tiết</a>
                                            <button class="btn_chitiet"><a href="product_details.php?proid=<?php echo $result_thuonghieu['productId'] ?>">Mua ngay</a> </button>
                                        </div>
                                    </a> 
                                </div>
                                <a href="product_details.php?proid=<?php echo $result_thuonghieu['productId'] ?>">
                                    <div class="trademark_item_lable">
                                        <h3><?php echo $fm->textShortenn($result_thuonghieu['brandName'], 25) ?></h3>
                                        <h4><?php echo $fm->textShorten($result_thuonghieu['productName'], 45) ?></h4>
                                        <span><?php echo $fm->format_currency($result_thuonghieu['price'])." VND" ?></span>
                                    </div>
                                </a>
                            </div>
                            <?php 
                            }
                            }
                            ?>
                           
                        </div>
                    </div>
                    <div  class="trademark-content_product-item adidas">
                        <div class="trademark-content_product-item_left">
                            <img src="admin/uploads/thuonghieu/adidas.jpg" alt="">
                        </div>
                        <div class="trademark-content_product-item_right">
                            <?php 
                                $product_thuonghieu = $product->get_thuonghieu_adidas();
                                if($product_thuonghieu){
                                    while ($result_thuonghieu = $product_thuonghieu->fetch_assoc()) {
                            ?>
                            <div class="trademark-content_product-item_right-item">
                            
                                <div class="trademark_item_image">
                                <a href="product_details.php?proid=<?php echo $result_thuonghieu['productId'] ?>">
                                    <img src="admin/uploads/<?php echo $result_thuonghieu['image'] ?>" alt="">
                                    <div class="buy_now">
                                        <a href="product_details.php?proid=<?php echo $result_thuonghieu['productId'] ?>">Click để xem chi tiết</a>
                                        <button class="btn_chitiet"><a href="product_details.php?proid=<?php echo $result_thuonghieu['productId'] ?>">Mua ngay</a> </button>
                                    </div>
                                </a> 
                                </div>
                                <a href="product_details.php?proid=<?php echo $result_thuonghieu['productId'] ?>">
                                <div class="trademark_item_lable">
                                    <h3><?php echo $fm->textShortenn($result_thuonghieu['brandName'], 25) ?></h3>
                                    <h4><?php echo $fm->textShorten($result_thuonghieu['productName'], 45) ?></h4>
                                    <span><?php echo $fm->format_currency($result_thuonghieu['price'])." VND" ?></span>
                                </div></a>
                            </div>
                            <?php 
                            }
                            }
                            ?>
                        </div>
                    </div>
                    <div  class="trademark-content_product-item vans">
                        <div class="trademark-content_product-item_left">
                            <img src="admin/uploads/thuonghieu/vans3.jpg" alt="">
                        </div>
                        <div class="trademark-content_product-item_right">
                        <?php 
                                $product_thuonghieu = $product->get_thuonghieu_vans();
                                if($product_thuonghieu){
                                    while ($result_thuonghieu = $product_thuonghieu->fetch_assoc()) {
                            ?>
                            <div class="trademark-content_product-item_right-item">
                                <div class="trademark_item_image">
                                    <a href="product_details.php?proid=<?php echo $result_thuonghieu['productId'] ?>">
                                        <img src="admin/uploads/<?php echo $result_thuonghieu['image'] ?>" alt="">
                                        <div class="buy_now">
                                            <a href="product_details.php?proid=<?php echo $result_thuonghieu['productId'] ?>">Click để xem chi tiết</a>
                                            <button class="btn_chitiet"><a href="product_details.php?proid=<?php echo $result_thuonghieu['productId'] ?>">Mua ngay</a> </button>
                                        </div>
                                    </a> 
                                </div>
                                <a href="product_details.php?proid=<?php echo $result_thuonghieu['productId'] ?>">
                                <div class="trademark_item_lable">
                                    <h3><?php echo $fm->textShortenn($result_thuonghieu['brandName'], 25) ?></h3>
                                    <h4><?php echo $fm->textShorten($result_thuonghieu['productName'], 45) ?></h4>
                                    <span><?php echo $fm->format_currency($result_thuonghieu['price'])." VND" ?></span>
                                </div></a>
                            </div>
                            <?php 
                            }
                            }
                            ?>
                        </div>
                    </div>
                    <div  class="trademark-content_product-item balenciaga">
                        <div class="trademark-content_product-item_left">
                            <img src="admin/uploads/thuonghieu/BALENCIAGA5.jpg" alt="">
                        </div>
                        <div class="trademark-content_product-item_right">
                        <?php 
                                $product_thuonghieu = $product->get_thuonghieu_baletiaga();
                                if($product_thuonghieu){
                                    while ($result_thuonghieu = $product_thuonghieu->fetch_assoc()) {
                            ?>
                            <div class="trademark-content_product-item_right-item">
                                <div class="trademark_item_image">
                                    <a href="product_details.php?proid=<?php echo $result_thuonghieu['productId'] ?>">
                                        <img src="admin/uploads/<?php echo $result_thuonghieu['image'] ?>" alt="">
                                        <div class="buy_now">
                                            <a href="product_details.php?proid=<?php echo $result_thuonghieu['productId'] ?>">Click để xem chi tiết</a>
                                            <button class="btn_chitiet"><a href="product_details.php?proid=<?php echo $result_thuonghieu['productId'] ?>">Mua ngay</a> </button>
                                        </div>
                                    </a> 
                                </div>
                                <a href="product_details.php?proid=<?php echo $result_thuonghieu['productId'] ?>">
                                <div class="trademark_item_lable">
                                    <h3><?php echo $fm->textShortenn($result_thuonghieu['brandName'], 25) ?></h3>
                                    <h4><?php echo $fm->textShorten($result_thuonghieu['productName'], 45) ?></h4>
                                    <span><?php echo $fm->format_currency($result_thuonghieu['price'])." VND" ?></span>
                                </div></a>
                            </div>
                            <?php 
                            }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main_center-slider_trademark slideanim">
            <div class="slider_trademark-image">
                <img src="admin/uploads/thuonghieu/nike_logo.jpg" alt="">
                <div class="overlay"></div>
            </div>
            <div class="slider_trademark-image">
                <img src="admin/uploads/thuonghieu/vans_logo.jpg" alt="">
                <div class="overlay"></div>
            </div>
            <div class="slider_trademark-image">
                <img src="admin/uploads/thuonghieu/adidas_logo.jpg" alt="">
                <div class="overlay"></div>
            </div>
            <div class="slider_trademark-image">
                <img src="admin/uploads/thuonghieu/balenciaga_logo.jpg" alt="">
                <div class="overlay"></div>
            </div>
            <div class="slider_trademark-image">
                <img src="admin/uploads/thuonghieu/nike_logo.jpg" alt="">
                <div class="overlay"></div>
            </div>
            <div class="slider_trademark-image">
                <img src="admin/uploads/thuonghieu/vans_logo.jpg" alt="">
                <div class="overlay"></div>
            </div>
            <div class="slider_trademark-image">
                <img src="admin/uploads/thuonghieu/adidas_logo.jpg" alt="">
                <div class="overlay"></div>
            </div>
            <div class="slider_trademark-image">
                <img src="admin/uploads/thuonghieu/balenciaga_logo.jpg" alt="">
                <div class="overlay"></div>
            </div>
            
        </div>
                        
    </div>
</div>



<?php include 'module/footer.php'; ?>
    
