<?php

if($pages >1){

    
    ?>
    
<div class="pager">
<div class="pager_0">
    <p class="pager_2" align="right">Страница <?php echo "$page из $pages";?>&nbsp;&nbsp;</p>
</div>
<?php

for($i=0;$i<$pages;$i++){

    
	$p = $i+1;
        
        ?>

<div class="pager_1">
    <p class="pager_2" align="center">
        <a href="<?php echo "index.php?act=look&page=$p$address";?>"><?php echo $p;?></a>
    </p>
</div>

<?php 
    }

?>

<div class="pager_end">
    <p class="pager_2" align="center">
        <a href="<?php echo "index.php?act=look&page=$pages$address";?>">..далее</a>
    </p>
</div>

</div>
            
<?php
    }


?>
