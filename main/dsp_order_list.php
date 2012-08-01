<div align="center">
<table class="arch_list" cellpadding="5" cellspacing="10">
<?php

$rowcount = 1;

//флажок для вывода
$first = 1;


$cnt = 0;

array_multisort($arhorder_array,SORT_DESC);

foreach ($arhorder_array as $row){ 

		
			
			// Выводим только завершенные
			if ($attributes[act] == 'arch_done' && $row["status"] == 6) {
				++$cnt;
                                                                    echo "<tr>";
            echo "<td><a href='index.php?act=view_archzakaz&stid=".$attributes[stid]."&id=".$row["id"]."'>N".$row["id"]." от ".$row["zakaz_date"]."&nbsp;-&nbsp;".$row["price_name"]."</a></td>";     
                       
        if ($first != 1) echo "</tr>";
        
        
				
			}
		                            
           
		if ($attributes[act] == 'arch_decline' && $row["status"] == 3) {
			                            
                    ++$cnt;                                                                echo "<tr>";
            echo "<td><a href='index.php?act=view_archzakaz&stid=".$attributes[stid]."&id=".$row["id"]."'>N".$row["id"]." от ".$row["zakaz_date"]."&nbsp;-&nbsp;".$row["price_name"]."</a></td>";     
                       
        if ($first != 1) echo "</tr>";
			
			
		}
                                
             
		
		
		if ($first == 1) 
		
		// Переборосим флажок вывода
		if ($first == 1) {
			$first = 0;
		} else {
			$first = 1;
		}
		
  ++$rowcount;   
}

if($cnt == 0 && $attributes[act] == 'arch_done' ){
    ?>
    <script language="javascript">
     alert("Архив заказов пуст.")
    window.location.href = "index.php?act=supplier";
       </script> 
    <?php
}
if($cnt == 0 && $attributes[act] == 'arch_decline' ){
    ?>
    <script language="javascript">
     alert("Архив отмененых заказов пуст.")
    window.location.href = "index.php?act=supplier";
       </script> 
    <?php
}

?>
</table></div>