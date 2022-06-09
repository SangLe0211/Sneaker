<div class="chuyentrang">
    <?php
        if ($current_page > 1){
            $prev_page = $current_page -1;
    ?>
        
        <a class="chuyentrang_prev" href="?per_page=<?=$item_per_page?>&page=<?=$prev_page?>"><i class="fas fa-chevron-left"></i></a>

    <?php }
        if($current_page > 3){
            $first_page = 1;
    ?>
        <a class="chuyentrang_first chuyentrang_extra" href="?per_page=<?=$item_per_page?>&page=<?=$first_page?>"><?=$first_page?>...</a>

    <?php } ?>
         
    <?php
        for ($num = 1; $num <= $totalPages; $num++){
    ?>
        <?php if($num != $current_page){ ?>
            <?php if ($num > $current_page - 3 && $num < $current_page + 3) { ?>
                <a class="chuyentrang_number" href="?per_page=<?=$item_per_page?>&page=<?=$num?>"><?=$num?></a>
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
        <a class="chuyentrang_end" href="?per_page=<?=$item_per_page?>&page=<?=$end_page?>">...<?=$end_page?></a>

    <?php }
        if ($current_page < $totalPages - 1){
            $next_page = $current_page + 1;
    ?>
    <a class="chuyentrang_next chuyentrang_extra" href="?per_page=<?=$item_per_page?>&page=<?=$next_page?>"><i class="fas fa-chevron-right"></i></a>

    <?php } ?>                      
</div>