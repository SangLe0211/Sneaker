<?php
    $query = mysqli_query($conn,"SELECT tbl_sanpham.*, tbl_thuonghieu.brandName  FROM tbl_sanpham JOIN tbl_thuonghieu
    ON tbl_sanpham.brandId = tbl_thuonghieu.brandId  where tbl_thuonghieu.brandId = '$id'");
    $result = mysqli_fetch_array($query)
?>
<div class="chuyentrang">
    <?php
        if ($current_page > 1){
            $prev_page = $current_page -1;
    ?>
        
        <a class="chuyentrang_prev" href="?idthuonghieu=<?php echo $result['brandId'] ?>?per_page=<?=$item_per_page?>&page=<?=$prev_page?>"><i class="fas fa-chevron-left"></i></a>

    <?php }
        if($current_page > 3){
            $first_page = 1;
    ?>
        <a class="chuyentrang_first chuyentrang_extra" href="?idthuonghieu=<?php echo $result['brandId'] ?>?per_page=<?=$item_per_page?>&page=<?=$first_page?>"><?=$first_page?>...</a>

    <?php } ?>
         
    <?php
        for ($num = 1; $num <= $totalPages; $num++){
    ?>
        <?php if($num != $current_page){ ?>
            <?php if ($num > $current_page - 3 && $num < $current_page + 3) { ?>
                <a class="chuyentrang_number" href="?idthuonghieu=<?php echo $result['brandId'] ?>?per_page=<?=$item_per_page?>&page=<?=$num?>"><?=$num?></a>
            <?php } ?>
        <?php 
            } else { 
        ?>

            <strong class="chuyentrang_number chuyentrang_number_color"><?=$num?></strong>
        <?php } ?>

    <?php } ?>
     
    <?php
        if($current_page < $totalPages - 3){
            $end_page = $totalPages;
    ?>
        <a class="chuyentrang_end" href="?idthuonghieu=<?php echo $result['brandId'] ?>?per_page=<?=$item_per_page?>&page=<?=$end_page?>">...<?=$end_page?></a>

    <?php }
        if ($current_page < $totalPages - 1){
            $next_page = $current_page + 1;
    ?>
    <a class="chuyentrang_next chuyentrang_extra" href="?idthuonghieu=<?php echo $result['brandId'] ?>?per_page=<?=$item_per_page?>&page=<?=$next_page?>"><i class="fas fa-chevron-right"></i></a>

    <?php } ?>                      
</div>
