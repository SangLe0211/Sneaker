<?php include '../xulydulieu/xulysanpham.php';  ?>
<?php 
	$product = new xulysanpham();
    if(isset($_GET['admin_del'])){
		$id = $_GET['admin_del'];
		$del_slider = $product->del_admin($id);

	}
	
 ?>
<div class="wraper_center_main_right-path">
    <div class="btn">
        <span class="fas fa-bars"></span>
    </div>
    <div class="detailed_path">
        <span><a href="index.php">Trang chủ</a></span>
        <span>/</span>
        <span>Tài khoản</span>
        
    </div>
</div>
<div class="wraper_center_main_right-main">
    <div class="wraper_center_main_right-main--center">
        <div class="wraper_center_main_right-main--center_main" > 
            <div class="main--center_main__btn_thembanner">
                <a href="index.php?action=addadmin&query=admin">Thêm admin</a>
            </div>
            <div class="main--center_main_table_dsadmin">

                <table class="table ds_admin">
                    <tr>
                        <th>Stt</th>
                        <th>Ảnh admin</th>
                        <th>Tên admin</th>
                        <th>Email</th>
                        <th>User</th>
                        <th>Password</th>
                        <th>lever</th>
                        <th>xu ly</th>
                    </tr>
                    <?php
                    $product = new xulysanpham();
                    $get_slider = $product->show_admin_list();
                    if($get_slider){
                        $i = 0;
                        while($result_slider = $get_slider->fetch_assoc()){
                            $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><img src="uploads/<?php echo $result_slider['imageadmin'] ?>" height="120px" width="500px"/></td>		
                        <td><?php echo $result_slider['adminName'] ?></td>
                        <td><?php echo $result_slider['adminEmail'] ?></td>
                        <td><?php echo $result_slider['adminUser'] ?></td>
                        <td class="pass"><?php echo $result_slider['adminPass'] ?></td>
                        <td>
                    
                        <?php
                                if($result_slider['level']==0){
                                   echo 'Giám đốc';
                                }else{
                                    echo 'Nhân viên';
                                }
                            ?>
                        </td>
                        <td>
                            <div class="td_banner">
                                <div class="btn_dssp btn_dssp--red">
                                    <a  onclick = "return confirm('Are you want to delete <?php echo $result_slider['adminName']  ?>???')" href="index.php?action=dsadmin&query=admin&admin_del=<?php echo $result_slider['adminId'] ?>">Delete</a>
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