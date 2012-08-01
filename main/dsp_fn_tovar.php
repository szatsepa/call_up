<?php
/*
Функция выводит описание единичного товара по штрих-коду
$barcode -- штрих-код товара

*/

function tovar ($barcode) {
    
    if ($barcode == '') return;
	
    $query = "SELECT barcode, 
					 name, 
					 short_description,
					 ingridients, 
					 specification, 
					 gost
                FROM goods
               WHERE barcode=$barcode";

    $qry_exist = mysql_query($query) or die($query);
    
    //Нет описания
    if (mysql_numrows($qry_exist) == 0) { 
	
		return;
	
    } else {
    // Есть описание
    ?>
     <br />
    
    
&nbsp;<table border='0' cellspacing='0' cellpadding='5'>
       
    <?php
        
        $row_count = 1;
        
        while ($row = mysql_fetch_assoc($qry_exist)) {
           
            echo "<tr>";			
			echo "<td>&nbsp;&nbsp;</td>";
			echo "<td class='tovar'><strong>Краткое описание:</strong></td>";
            echo "<td class='tovar2'>".trim($row["short_description"])."</td>";	
			echo "</tr>";
			
            echo "<tr>";			
			echo "<td>&nbsp;&nbsp;</td>";
			echo "<td class='tovar'><strong>Состав:</strong></td>";
            echo "<td class='tovar2'>".trim($row["ingridients"])."</td>";	
			echo "</tr>";
			
			echo "<tr>";
			echo "<td>&nbsp;&nbsp;</td>";
			echo "<td class='tovar'><strong>Описание:</strong></td>";
            echo "<td class='tovar2'>".trim($row["specification"])."</td>";	
			echo "</tr>";
			
			echo "<tr>";
			echo "<td>&nbsp;&nbsp;</td>";
            echo "<td><strong>Коммерческое название:</strong></td>";
			echo "<td>".$row["name"]."</td>";	
			echo "</tr>";
			
			echo "<tr>";
			echo "<td></td>";
			echo "<td>&nbsp;&nbsp;</td>";
            echo "<td>".$row["gost"]."</td>";	
			echo "</tr>";
		   
		  
           
		   ++$row_count;
        }    
    ?>    
    </table>    
    <br />
       
    <?php
    } // if (mysql_numrows($qry_exist) == 0)
return;
}
?>
