<br />
<br />
<table class="dat">
<th class="dat">Штрих-код</th>
<th class="dat">Наименование</th>
<th class="dat">Краткое описание</th>
<th class="dat">Состав</th>
<th class="dat">Описание</th>
<th class="dat">Сайт поддержки</th>
<th class="dat"></th>
<th class="dat"></th>

<?php 

$item_array = array();

if(isset ($attributes[page])){
    
    $page = intval($attributes[page]);
    
    $start = 36 + 36*$page;
    
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

while ($row = mysql_fetch_assoc($qry_goods)) {
    
    array_push($item_array, $row);
    
}

$rows = 0;

for($i=$start;$i<(count($item_array)-1);$i++) {
    
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
//        print_r($row);
//        echo "<br/>";
    echo "<tr>";
    echo "<td class='dat'>".$row["barcode"]."</td>";
    echo "<td class='dat'>".$row["name"]."</td>";
	echo "<td class='dat'>".$row["short_description"]."</td>";
    echo "<td class='dat'>".$row["ingridients"]."</td>";
    echo "<td class='dat'>".$row["specification"]."</td>";
    echo "<td class='dat'>".$row["gost"]."</td>";
    echo "<td class='dat'><a href='index.php?act=tovar_edit&barcode=".$row["barcode"]."'>Редакт.</a></td>";
    echo "<td class='dat'><!-- a href='index.php?act=tovar_delete&barcode=".$row["barcode"]."'>Удалить</a --></td>";
?>
        
<?php        
    echo "</tr>";
    
//    if($rows == 36){
//        
//                break;
//                 
//                }
    
    $rows++;
}

$page += 1;

?>
<tr>
    <td>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </td>
    <td>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </td>
    <td align="center">
        <?php
        if($rows < count($item_array)){
            ?>
<!--        <p align="center"><a href="index.php?act=goods&page=<?php echo $page;?>">Dalsche >>> </a></p>   -->
        <?php
        }
        ?>
    </td>
    <td>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </td>
    <td>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </td>
</tr>
</table>
<br/>
