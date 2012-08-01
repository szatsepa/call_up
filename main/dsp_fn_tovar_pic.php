<?php
/*
Функция выводит картинки единичного товара по штрих-коду
$barcode -- штрих-код товара
$mode    -- edit (редактирование), "" просто отображение картинок

*/

function tovar_pic ($barcode, $mode) {
    
    if ($barcode == '') return;
	
	$pic_dir   = $document_root . '/images/goods/';
	
	// Какие картинки есть для товара?
	$query = "SELECT id, 
					 barcode, 
					 pictype, 
					 extention
				FROM goods_pic
			   WHERE barcode = $barcode
			ORDER BY pictype,id ";
	
	$qry_pics = mysql_query($query) or die($query);
	
	if ($mode == edit) { ?>
	
<br /><br />

<form enctype="multipart/form-data" action="index.php?act=upload_tovarpic&barcode=<?php echo $barcode; ?>" method="post">
<table class="dat" width="99%">
<tr>
    <tr>
        <td align="left" valign="top" colspan="2"><strong>Загрузка изображений товарa</strong><br /><br /></td>
    </tr>
	<tr>
	<td  valign="top" colspan="2"><select name="pictype"><?php  option ("pictype","id","name",2,"id > 0 ORDER BY id"); ?></select></td>
	</tr>
	<tr>
   
		<input type="hidden" name="MAX_FILE_SIZE" value="8192000"> 
		 
	<td valign="top"><input name="userfile" type="file" size="50"></td>
	
	<td valign="top"><input type="submit" value="Загрузить jpg-файл" id="knob"></td>	
	
	</tr>
	<tr>
	<td colspan="2">
<small>Повторная загрузка основного изображения или штрихкодов заменяет их предыдущие изображения.</small>
	</td>
	
</tr>

</table>
</form>
<br />
	
<?php }
	// Здесь выводим изображения
	
	while ($row = mysql_fetch_assoc($qry_pics)) {
	
		$picname = $row["id"].".".$row["extention"];
		
		pic ($picname,128);
	
	
	}

	return;
}

?>