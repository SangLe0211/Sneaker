<div class="header_bottom">
    <?php 
        $get_slider = $product->show_slider();
        if ($get_slider) {
            while ($result_slider = $get_slider->fetch_assoc()) {
                # code...
            
    ?>
    <div class="image">
        <img src="admin/uploads/<?php echo $result_slider['slider_image']?>">
    </div>
    <?php 
    }
    }
    ?>
    
</div>
<!-- <div class="image">
    <img src="admin/uploads/banner/jorden.jpg">
</div>
<div class="image">
    <img src="admin/uploads/banner/nike.jpg">
</div>
<div class="image">
    <img src="admin/uploads/banner_test2.jpg">
</div>
<div class="image">
    <img src="admin/uploads/banner/adidas.jpg">
</div>
<div class="image">
    <img src="admin/uploads/banner_test1.jpg">
</div>
<div class="image">
    <img src="admin/uploads/banner/nike5.jpg">
</div> -->