<?php

// Edit/update user form


if ($attributes[act] == 'tovar_edit') {
    
    $row = mysql_fetch_assoc($qry_goods);
    //$row      = mysql_fetch_assoc($qry_user);
    
    $act    = "tovar_update&id=".$row["barcode"];
    $submit = "Обновить информацию";
    
    $barcode         	= $row["barcode"];
    $name            	= $row["name"];
	$short_description	= $row["short_description"];
    $ingridients 	 	= $row["ingridients"];
    $specification   	= $row["specification"];
    $gost      		 	= $row["gost"];
    $nds = $row[nds];
	$disabled   	 	= " disabled='disabled'";
    
} else {
    $act        = "tovar_add";
    $submit     = "Добавить товар";
      
    $barcode         	= "";
    $name            	= "";
	$short_description 	= "";
    $ingridients 	 	= "";
    $specification   	= "";
    $gost      		 	= "";
	$disabled   	 	= "";
        $nds = "";
}
//$disabled   	 	= "";
 ?>

 <form enctype="multipart/form-data" action="index.php?act=uploadgoods" method="post">
	<input type="hidden" name="MAX_FILE_SIZE" value="1048575"/>        
    <input name="userfile" type="file" size="20" required/>
    <input type="submit" value="Загрузить инф. о товарах"/>
</form>
<br />&nbsp;
<br />
 
<br />
<br />

<table border="0" cellpadding="0" cellspaciing="15">
<tr>
    <form action="index.php?act=<?php echo $act ?>" method="post" name="tovar_add">
	<td>Штрих-код</td>
	<td><input required type="text" name="barcode" size="25" maxlength="25" value="<?php echo $barcode; ?>" <?php echo $disabled; ?>/></td>
</tr>
<tr>
	<td>Наименование товара</td>
	<td><input type="text" name="name" size="105" maxlength="255" value="<?php echo $name; ?>"></td>
</tr>
<tr>
	<td>Краткое описание</td>
	<td><input type="text" name="short_description" size="105" maxlength="255" value="<?php echo $short_description; ?>"></td>
</tr>
<tr>
	<td>Состав</td>
	<td><textarea name="ingridients" rows="3" cols="80" wrap="soft" ><?php echo $ingridients; ?></textarea></td>
</tr>
<tr>
	<td>Описание</td>
	<td><textarea name="specification" rows="3" cols="80" wrap="soft" ><?php echo $specification; ?></textarea></td>
</tr>
<tr>
	<td>Сайт поддержки</td>
	<td><input type="text" name="gost" size="25" value="<?php echo $gost; ?>"/></td>
</tr>
<tr>
<input type="hidden" name="page" value="<?php echo $attributes[page];?>"/>
	<td>НДС %</td>
	<td><input type="text" name="nds" size="25" value="<?php echo $nds; ?>"/></td>
</tr>
<tr><td></td><td>
<table>
    <tr>
	
	<td align="right"><br /><input type="submit" value="<?php echo $submit; ?>" /></td>
 </form>  
<?php if ($attributes[act] == 'tovar_edit') { ?>
<form action="index.php?act=del_item" method="post">
    <input type="hidden" name="page" value="<?php echo $attributes[page];?>"/>
    <input type="hidden" name="barcode" value="<?php echo $barcode;?>"/>
        <td align="right"><br />
            <input type="submit" value="Удалить" />
        </td>
</form> 
<?php } ?>
        </tr>
</table>
        </td>
</tr>
</table>
       

<br />

<?php
if ($attributes[act] == 'tovar_edit') {

	tovar_pic($barcode,'edit');

}

?>
