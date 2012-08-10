<?php

if($pages > 1){
?>
<!--<table class="dat" border="1">
<tr align="center">
<td align="center">
</td>
</tr>
</table>-->
<p align="center">
 <?php 
   
 if($page > 0)echo "<a href='index.php?act=goods&page=0'><<&nbsp;Первая &nbsp;</a><a href='index.php?act=goods&page=".($page-1)."'>Предыдущая&nbsp;</a>";      
  ?>      
        
        
<?php

for($i=($page);$i<($page+4);$i++){

    if($i == $pages)break;
    
	$p = $i+1;
        
        ?>

        
        <a href="<?php echo "index.php?act=goods&page=$p";?>"><?php echo $p;?></a>
    



<?php 

    }
  
    
    if($page < $pages) echo "<a href='index.php?act=goods&page=".($page+1)."'>&nbsp;Следующая</a><a href='index.php?act=goods&page=".$pages."'>&nbsp;Последняя&nbsp;>> </a>";
  
 $end = $start + 36; 
?>
</p>
<p align="center">Строки <?php echo ($start+1)." - ".$end." из ".$cnt;?>&nbsp;&nbsp;</p>

            
<?php
    }

?>
