<?php

if($pages >1){
?>
<div class="pager">

<div class="pager_1">
    <p class="pager_2" align="center" >
 <?php 
 if($page > 1){
 ?>
        <a href="<?php echo 'index.php?act=look&page=1'.$address;?>" style="font-size: 16px;color:#990033;"onmouseover="this.style.color='#878787'" onmouseout="this.style.color='#990033'"><<&nbsp;Первая &nbsp;</a>
        <a href="<?php echo "index.php?act=look&page=".($page-1).$address;?>" style="font-size: 16px;color:#990033;"onmouseover="this.style.color='#878787'" onmouseout="this.style.color='#990033'">Предыдущая&nbsp;</a>
<?php
 }
for($i=($page-1);$i<($page+3);$i++){

    if($i == $pages)break;
    
	$p = $i+1;
        
        ?>

    
        <a href="<?php echo "index.php?act=look&page=$p$address";?>" style="font-size: 16px;color:#990033;"onmouseover="this.style.color='#878787'" onmouseout="this.style.color='#990033'"><?php echo $p;?></a>
    



<?php 

    }
  if($page < $pages){  
    ?>
        <a href="<?php echo "index.php?act=look&page=".($page+1).$address;?>" style="font-size: 16px;color:#990033;"onmouseover="this.style.color='#878787'" onmouseout="this.style.color='#990033'">&nbsp;Следующая</a>
        <a href="<?php echo "index.php?act=look&page=".$pages.$address;?>" style="font-size: 16px;color:#990033;"onmouseover="this.style.color='#878787'" onmouseout="this.style.color='#990033'">&nbsp;Последняя&nbsp;>> </a>
    </p>
 </div>    
    <?php
  }
?>

</div>
<div class="pager_0">  
    <p class="pager_2" align="center">Страница <?php echo "$page из $pages";?>&nbsp;&nbsp;</p>
</div>
            
<?php
    }


?>
