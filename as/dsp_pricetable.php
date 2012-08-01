<?php 

// Здесь выводится краткая таблица всех прайсов в системе 

?>
<table class="dat">
<th class="dat">Компания</th>
<th class="dat">Дата загрузки</th>
<th class="dat">Наименование</th>
<th class="dat">Мин. заказ</th>
<th class="dat"></th>
<?php 
while ($row = mysql_fetch_assoc($qry_prices)) { 

	$price_id    = $row["id"];
    $rubrika_id  = $row["rubrika"];
    $comment     = $row["comment"];
	$tags        = $row["tags"];
	$zakaz_limit = $row["zakaz_limit"];
	
	if ($zakaz_limit == 0) $zakaz_limit = '';
	
		
?>
<tr>
	<td><?php echo $row["name"];?></td>
	<td><?php 
            if ($row["creation"] == '') {
                echo "<div style='color:red'>Не загружен</div>";
            } else {
                echo "<small>".$row["creation"]."</small>";
            }
    ?></td>
	<td><?php echo $comment;?></td>
	<td><div align="center"><?php echo $zakaz_limit;?></div></td>
	<td><a href="index.php?act=price&amp;price_id=<?php echo $price_id;?>">Редактировать</a><td>
</tr>
<?php } ?>
</table>