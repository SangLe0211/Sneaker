<?php  include '../xulydulieu/xulythuonghieu.php'; ?>

<?php
    // gọi class xuly
    $thuonghieu = new xulythuonghieu();     
    if(isset($_GET['idthuonghieu'])){
        $id = $_GET['idthuonghieu']; // Lấy catid trên host
        $delthuonghieu = $thuonghieu->del_brand($id); // hàm check delete Name khi submit lên
    }
 ?>
<div class="wraper_center_main_right-path">
    <div class="btn">
        <span class="fas fa-bars"></span>
    </div>
    <div class="detailed_path">
        <span><a href="index.php">Trang chủ</a></span>
        <span>/</span>
        <span>Thương hiệu</span>
        <span>/</span>
        <span>Danh sách thương hiệu</span>
    </div>
</div>
<div class="wraper_center_main_right-main">
    <div class="wraper_center_main_right-main--center">
        <div class="wraper_center_main_right-main--center_main">
        
        <table class="table">
            
            <tr>
                <th>Stt Thương Hiệu</th>
                <th>Tên Thương Hiệu</th>
                <th>Quản lý</th>
            </tr>
            <?php 
            $show_thuonghieu = $thuonghieu -> show_brand();
            if($show_thuonghieu){
                $i = 0;
                while($result = $show_thuonghieu -> fetch_assoc()){
                    $i++;
                
            ?>
            <tr>
                <td><?php echo $i  ?></td>
                <td><?php echo $result['brandName']  ?></td>
                <td class ="td_danhmuc">
                    <div class="btn_dssp btn_dssp--blue">
                         <a href="?action=quanlythuonghieu&query=suathuonghieu&idthuonghieu=<?php echo $result['brandId']?>">Update</a>
                    </div>
                    <div class="btn_dssp btn_dssp--red">
                        <a onclick = "return confirm('Are you want to delete???')" href="?action=quanlythuonghieu&query=dsthuonghieu&idthuonghieu=<?php echo $result['brandId'] ?>">Delete</a>
                    </div>
                </td>
            </tr>
            <?php
                }
            }

            ?>
        </table>
       </div>
    </div>
</div>