<?php 

$item_array = array();


while ($row = mysql_fetch_assoc($qry_goods)) {
    
    array_push($item_array, $row);
    
}



$cnt = count($item_array);

$pages = ceil($cnt/36);

if(isset ($attributes[page])){
    
    $page = intval($attributes[page]);
    
    $start = 36*$page;
    
}else{
    
    $start = 0;
    
    $page = 0;
    
}

if($start > (count($item_array) + 1)){
    
    $start = (count($item_array) - 36);
}
if($start < 0){
    
    $start = 0;
}


?>
<br />
<?php 
//echo "$page ==== $cnt  -   $pages  &&& start >> $start<br/>";
include 'dsp_pager.php';
?>
<br />
<table class="dat">
<th class="dat">Штрих-код</th>
<th class="dat">Наименование</th>
<th class="dat">Краткое описание</th>
<th class="dat">Состав</th>
<th class="dat">Описание</th>
<th class="dat">Сайт поддержки</th>
<th class="dat">НДС %</th>
<th class="dat"></th>

<?php

$rows = 0;

for($i=$start;$i<($cnt-1);$i++) {
    
    $row = $item_array[$i];
	
	if (strlen($row["short_description"]) > 32) {
            
            $row["short_description"] = iconv("UTF-8", "WINDOWS-1251", $row["short_description"]);
	
		$row["short_description"] = substr($row["short_description"],0,32)."...";
                
                $row["short_description"] = iconv("WINDOWS-1251", "UTF-8", $row["short_description"]);
	
	} else {
		
		$row["short_description"] = $row["short_description"];
		
	}
	
	if (strlen($row["ingridients"]) > 25) {
            
             $row["ingridients"] = iconv("UTF-8", "WINDOWS-1251", $row["ingridients"]);
	
		$row["ingridients"] = substr($row["ingridients"],0,25)."...";
                
                $row["ingridients"] = iconv("WINDOWS-1251", "UTF-8", $row["ingridients"]);
	
	} else {
		
		$row["ingridients"] = $row["ingridients"];
		
	}
	
	if (strlen($row["specification"]) > 50) {
	
		$row["specification"] = iconv("UTF-8", "WINDOWS-1251", $row["specification"]);
	
		$row["specification"] = iconv_substr($row["specification"],0,50)."...";
                
               $row["specification"] = iconv("WINDOWS-1251", "UTF-8", $row["specification"]);
	
	} else {
		
		$row["specification"] = $row["specification"];
		
	}

    echo "<tr>";
    echo "<td class='dat'>".$row["barcode"]."</td>";
    echo "<td class='dat'>".$row["name"]."</td>";
	echo "<td class='dat'>".$row["short_description"]."</td>";
    echo "<td class='dat'>".$row["ingridients"]."</td>";
    echo "<td class='dat'>".$row["specification"]."</td>";
    echo "<td class='dat'>".$row["gost"]."</td>";
    echo "<td class='dat'>".$row["nds"]."</td>";
    echo "<td class='dat'><a href='index.php?act=tovar_edit&barcode=".$row["barcode"]."&page=".$attributes[page]."'>Редакт.</a></td>";
    echo "<td class='dat'><!-- a href='index.php?act=tovar_delete&barcode=".$row["barcode"]."&page=".$attributes[page]."'>Удалить</a --></td>";
?>
        
<?php        
    echo "</tr>";
    
    if($rows > 34){
        
                break;
                 
                }
    
    $rows++;
}

?>
</table>
<br/>
<!--<tr></tr>-->
    
        <?php
            include 'dsp_pager.php';
        ?>
    


