<?php include '../xulydulieu/xuly.php';  ?>
<?php
    // gọi class xuly
    $cat = new xuly();     
    if(isset($_GET['iddanhmuc'])){
        $id = $_GET['iddanhmuc']; // Lấy catid trên host
        $delCat = $cat->del_category($id); // hàm check delete Name khi submit lên
    }
 ?>

<div class="wraper_center_main_right-path">
    <div class="btn">
        <span class="fas fa-bars"></span>
    </div>
    <div class="detailed_path">
        <span><a href="index.php">Trang chủ</a></span>
        <span>/</span>
        <span>Danh mục</span>
        <span>/</span>
        <span>Danh sách danh mục</span>
    </div>
</div>
<div class="wraper_center_main_right-main">
    <div class="wraper_center_main_right-main--center">
        <div class="wraper_center_main_right-main--center_main" > 
        <table class="table">
            <tr>
                <th>Stt Danh Mục</th>
                <th>Tên Danh Mục</th>
                <th>Quản lý</th>
            </tr>
            <?php 
            $show_cat = $cat -> show_category();
            if($show_cat){
                $i = 0;
                while($result = $show_cat -> fetch_assoc()){
                    $i++;
                
            ?>
            <tr>
                <td><?php echo $i  ?></td>
                <td><?php echo $result['tendanhmuc']  ?></td>
                <td class ="td_danhmuc">
                    <div class="btn_dssp btn_dssp--blue">
                        <a  href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $result['id_danhmuc']?>">Update</a>
                    </div>
                    <div class="btn_dssp btn_dssp--red">
                        <a  onclick = "return confirm('Are you want to delete <?php echo $result['tendanhmuc']  ?>???')" href="?action=quanlydanhmucsanpham&query=dsdanhmuc&iddanhmuc=<?php echo $result['id_danhmuc'] ?>">Delete</a>
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