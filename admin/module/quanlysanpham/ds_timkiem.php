
<?php include '../xulydulieu/xulysanpham.php';  ?>
<?php
	if(isset($_POST['timkiem'])){
		$tukhoa = $_POST['tukhoa'];
	}
	$sql_pro = "SELECT * FROM tbl_sanpham,tbl_thuonghieu WHERE tbl_sanpham.brandId=tbl_thuonghieu.brandId AND tbl_sanpham.productName LIKE '%".$tukhoa."%'";
	$query_pro = mysqli_query($conn,$sql_pro);
	
	?>
<div class="wraper_center_main_right-path">
    <div class="btn">
        <span class="fas fa-bars"></span>
    </div>
    <div class="detailed_path">
        
    </div>
</div>
<div class="wraper_center_main_right-main">
    <div class="wraper_center_main_right-main--center center--padding">
        <div class="wraper_center_main_right-main--center_main" style="overflow-x: auto;">
        <?php 
                    if(!empty($tukhoa)){
                        $sql_pro = "SELECT * FROM tbl_sanpham,tbl_thuonghieu WHERE tbl_sanpham.brandId=tbl_thuonghieu.brandId AND tbl_sanpham.productName LIKE '%".$tukhoa."%'";
                        $query_pro = mysqli_query($conn,$sql_pro);
                    ?>
        <div class="form_timkiem">
            <form action="?action=quanlysanpham&query=dstimkiem" method="POST">
                <div class="form_timkiem_content">
                    <input class="input_search" type="text" name="tukhoa" value="Tìm kiếm sản phẩm..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Tìm sản phẩm';}">
                    <input class="btn_search" type="submit" name="timkiem"  value="&#xf002;">
                </div>
            </form>
        </div>
        
        <table class="table sanpham">
            <tr>
                <th>ID</th>
                <th>Mã sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Số Lượng</th>
                <!-- <th>Danh mục</th> -->
                <th>Thương hiệu</th>
                <th>Giá</th>
                <th>Loại</th>
                <th>Quản lý</th>
            </tr>
           <?php 
				
        //    $pdlist = $pd->show_product();
        //        if($pdlist){
        //                while ($result = $pdlist->fetch_assoc()){
            $i = 0;
            // $pdlist = $query_pro;
            
                while ($result = mysqli_fetch_array($query_pro)) {
                    $i++;            
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $result['product_code'] ?></td>
                <td><img src="uploads/<?php echo $result['image'] ?>" width="120px"></td>
                <td><?php echo $result['productName'] ?></td>
                <!-- <td><a href="productmorequantity.php?productid=<?php echo $result['productId'] ?>">Nhập hàng</a></td> -->
                <!-- <td><?php echo $result['productQuantity'] ?></td> -->
                <!-- <td><?php echo $result['product_soldout'] ?></td> -->
                <td><?php echo $result['product_remain'] ?></td>
                <!-- <td><?php echo $result['tendanhmuc'] ?></td> -->
                <td><?php echo $result['brandName'] ?></td>
                <td><?php echo $result['price'] ?></td>
                <td>
                    <?php 
                        if($result['type']==0){
                            echo 'Sản Phẩm Mới';
                        }else{
                            echo 'Gợi ý dành riêng cho bạn';
                        }
                    ?>
                </td>
                <td>
                <div class="btn_dssp btn_dssp--blue">
                        <a href="?action=quanlysanpham&query=sua&productid=<?php echo $result['productId']?>">Update</a>
                    </div>
                    <div class="btn_dssp btn_dssp--red">
                        <a onclick = "return confirm('Are you want to delete <?php echo $result['productName']  ?>???')" href="?action=quanlysanpham&query=dssanpham&productid=<?php echo $result['productId'] ?>">Delete</a>
                    </div>
                </td>
            </tr>
            <?php
                }
            
            

            ?>
        </table>
        <?php
            }else{
                echo'<div class="product_content-heading-error">
                       
                        <h3>Từ khóa đang trống. Bạn hãy nhập một từ khóa bất kỳ để tìm kiếm! </h3>
                        <a href="index.php?action=quanlysanpham&query=dssanpham"><i class="fa fa-reply"> </i> Bấm vào đây để quay lại.</a>
                    </div>
                    ';
            }
        ?>
       </div>
      
    </div>
</div>