<?php include '../xulydulieu/xulysanpham.php';  ?>
<?php 
	$product = new xulysanpham();
	if(isset($_GET['type_slider']) && isset($_GET['type'])){
		$id = $_GET['type_slider'];
		$type = $_GET['type'];
		$update_type_slider = $product->update_type_slider($id,$type);

	}
	if(isset($_GET['slider_del'])){
		$id = $_GET['slider_del'];
		$del_slider = $product->del_slider($id);

	}
 ?>
<div class="wraper_center_main_right-path">
    <div class="btn">
        <span class="fas fa-bars"></span>
    </div>
    <div class="detailed_path">
        <span><a href="index.php">Trang chủ</a></span>
        <span>/</span>
        <span>Quản lí banner</span>
        
    </div>
</div>
<div class="wraper_center_main_right-main">
    <div class="wraper_center_main_right-main--center">
        <div class="wraper_center_main_right-main--center_main" > 
            <div class="main--center_main__btn_thembanner">
                <a href="index.php?action=quanlybanner&query=add_banner">Thêm banner</a>
            </div>
            <div class="main--center_main_table_dsbanner">

                <table class="table ds_banner">
                    <tr>
                        <th>Stt</th>
                        <th>Tên banner</th>
                        <th>Hình ảnh banner</th>
                        <th>Hiển thị</th>
                        <th>Xử lý</th>
                    </tr>
                    <?php
                    $product = new xulysanpham();
                    $get_slider = $product->show_slider_list();
                    if($get_slider){
                        $i = 0;
                        while($result_slider = $get_slider->fetch_assoc()){
                            $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result_slider['sliderName'] ?></td>
                        <td><img src="uploads/<?php echo $result_slider['slider_image'] ?>" height="120px" width="500px"/></td>		
                        <td>
                            <?php
                                if($result_slider['type']==1){
                                    ?>
                                        <a href="index.php?action=quanlybanner&query=banner&type_slider=<?php echo $result_slider['sliderId'] ?>&type=0">Ẩn</a> 
                                    <?php
                                }else{
                                    ?>	
                                        <a href="index.php?action=quanlybanner&query=banner&type_slider=<?php echo $result_slider['sliderId'] ?>&type=1">Hiển thị</a> 
                                    <?php
                                }
                            ?>
    
                        </td>	
                        <td >
                            <div class="td_banner">
                                <div class="btn_dssp btn_dssp--red">
                                    <a  onclick = "return confirm('Are you want to delete <?php echo $result_slider['sliderName']  ?>???')" href="index.php?action=quanlybanner&query=banner&slider_del=<?php echo $result_slider['sliderId'] ?>">Delete</a>
                                </div>
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
</div>