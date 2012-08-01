<div align="center">
<table border="0" cellpadding="5" cellspacing="10" style="font-size:10pt;" width="70%">
<?php

$rowcount = 1;

//флажок для вывода
$first = 1;

while ($row = mysql_fetch_assoc($qry_archzakazlist)) { 

		if ($attributes[act] == 'arch_done') {
			
			// Выводим только завершенные
			if ($row["status"] <> 6) {
				
				continue;
				
			}
		}
		
		if ($attributes[act] == 'arch_decline') {
			
			// Выводим только отмененные
			if ($row["status"] <> 3) {
			
				continue;
			
			}
		}
		
		if ($first == 1) echo "<tr>";
        if ($attributes[act] == 'arch_zakaz') {
            echo "<td><a href='index.php?act=view_archzakaz&zakaz=no&id=".$row["id"].$urladd."'>N".$row["id"]." ".$row["zakaz_date"]."&nbsp;&nbsp;".$row["price_name"]."&nbsp;&nbsp;".$row["surname"]."</a></td>";
        } else {
            echo "<td><a href='index.php?act=view_archzakaz&id=".$row["id"].$urladd."'>N".$row["id"]." ".$row["zakaz_date"]."&nbsp;&nbsp;".$row["price_name"]."</a></td>";     
        }                
        if ($first != 1) echo "</tr>";
		
		// Переборосим флажок вывода
		if ($first == 1) {
			$first = 0;
		} else {
			$first = 1;
		}
		
    ++$rowcount;
}


?>
</table></div>