<div align="center">
<table class="arch_list" cellpadding="5" cellspacing="10">
<?php

$rowcount = 1;

//флажок для вывода
$first = 1;

////print_r($arhorder_array);
//echo "<br/>";

foreach ($arhorder_array as $row){ 

		if ($attributes[act] == 'all_orders') {
			
			// Выводим только завершенные
			if ($row["status"] == 6) {
				
//				continue;
                            
                            echo "<tr>";
            echo "<td><a href='index.php?act=view_arch_order&stid=".$attributes[stid]."&id=".$row["id"]."'>N".$row["id"]." от ".$row["zakaz_date"]."&nbsp;-&nbsp;".$row["price_name"]."</a></td>";     
                       
        if ($first != 1) echo "</tr>";
        
         ++$rowcount; 
				
			}
		}
		
//		if ($attributes[act] == 'arch_decline') {
//			
//			// Выводим только отмененные
//			if ($row["status"] <> 3) {
//			
//				continue;
//			
//			}
//		}
		
//		if ($first == 1) 
//		
//		// Переборосим флажок вывода
//		if ($first == 1) {
//			$first = 0;
//		} else {
//			$first = 1;
//		}
		
   
}

if($rowcount == 1){
    ?>
    <script language="javascript">
     alert("Архив заказов пуст.")
    window.location.href = "index.php?act=look&stid=<?php echo $attributes[stid];?>";
       </script> 
    <?php
}
?>
</table></div>