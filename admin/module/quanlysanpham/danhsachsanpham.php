
<?php include '../xulydulieu/xulysanpham.php';  ?>
<?php include '../xulydulieu/xulythuonghieu.php';  ?>
<?php require_once '../helpers/format.php'; ?>
<?php 
	$pd = new xulysanpham();
	$fm = new Format();
	if(!isset($_GET['productid']) || $_GET['productid'] == NULL){
        // echo "<script> window.location = 'catlist.php' </script>";
        
    }else {
        $id = $_GET['productid']; // Lấy catid trên host
        $delProduct = $pd -> del_product($id); // hàm check delete Name khi submit lên
        $delProducts = $pd -> del_imgs_product($id); // hàm check delete Name khi submit lên
    }
    $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:8;
    $current_page =!empty($_GET['page'])?$_GET['page']:1;
    $offset = ($current_page - 1) * $item_per_page;
    $query = mysqli_query($conn,"SELECT tbl_sanpham.*, tbl_thuonghieu.brandName  FROM tbl_sanpham JOIN tbl_thuonghieu ON tbl_sanpham.brandId = tbl_thuonghieu.brandId   order by productId desc LIMIT ".$item_per_page." OFFSET ".$offset.	"") ;
    $totalRecords = mysqli_query($conn, "SELECT tbl_sanpham.*, tbl_thuonghieu.brandName  FROM tbl_sanpham JOIN tbl_thuonghieu ON tbl_sanpham.brandId = tbl_thuonghieu.brandId");
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
 ?>
<div class="wraper_center_main_right-path">
    <div class="btn">
        <span class="fas fa-bars"></span>
    </div>
    <div class="detailed_path">
        <span><a href="index.php">Trang chủ</a></span>
        <span>/</span>
        <span>Sản phẩm</span>
        <span>/</span>
        <span>Danh sách sản phẩm</span>
    </div>
</div>
<div class="wraper_center_main_right-main">
    <div class="wraper_center_main_right-main--center center--padding--sanpham center--padding">
        <div class="wraper_center_main_right-main--center_main" style="overflow-x: auto;" >
        <div class="form_timkiem">
            <form action="?action=quanlysanpham&query=dstimkiem" method="POST">
                <div class="form_timkiem_content">
                    <input class="input_search" type="text" name="tukhoa" placeholder="Tìm kiếm sản phẩm...">
                    <input class="btn_search" type="submit" name="timkiem"  value="&#xf002;">
                </div>
            </form>
            
        </div>
        <table class="table sanpham " >
            <tr>
                <th >ID</th>
                <th>Mã sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
               
                <th>Số Lượng</th>
                <th>Đã bán</th>
				<th>Còn lại</th>
                <th>Thương hiệu</th>
                <th>Giá</th>
                <th>Loại</th>
                <th>Quản lý</th>

                
            </tr>
            <?php 
                $i = 0;
                while ($result = mysqli_fetch_array($query)) {
                    $i++;        
            ?>
            <tr>
                    <td><?php echo $i ?></td>
					<td><?php echo $result['product_code'] ?></td>
                    <td><img src="uploads/<?php echo $result['image'] ?>" width="120px"></td>
					<td><?php echo $result['productName'] ?></td>
					
					<td><?php echo $result['productQuantity'] ?></td>
					<td><?php echo $result['product_soldout'] ?></td>
                    <td><?php echo $result['product_remain'] ?></td>
                    <!-- <td><?php echo $result['tendanhmuc'] ?></td> -->
					<td><?php echo $result['brandName'] ?></td>
                    <td><?php echo $fm->format_currency($result['price'])." VND" ?></td>
					<td><?php 
						if($result['type']==0){
							echo 'Sản Phẩm Mới';
						}else{
                            echo 'Gợi ý dành riêng cho bạn';
                        }

					?></td>
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
            // }

            ?>
        </table>
       </div>
       <?php include 'phantrang.php';  ?>
    </div>
</div>