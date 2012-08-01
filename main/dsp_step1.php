<?php

if ($price_id > 0 and ($total - $zakaz_limit) >= 0) {
	
	if (isset($attributes[contragent_id])) {
		$contragent_id   = $attributes[contragent_id];
	} else {
		$contragent_id   = '';
	}
	
	if (isset($attributes[contragent_name])) {
		$contragent_name = $attributes[contragent_name];
	} else {
		$contragent_name = '';
	}
	
	if (isset($attributes[shipment])) {
		$shipment        = $attributes[shipment];
	} else {
		$shipment        = '';
	}
	
	if (isset($attributes[comments])) {
		$comments        = $attributes[comments];
	} else {
		$comments        = '';
	}
	
	if (isset($attributes[tags])) {
		$tags		     = $attributes[tags];
	} else {
		$tags  		     = '';
	}
	
	
	if (isset ($attributes[id])) {
	    $row             = mysql_fetch_assoc($qry_archzakaz);
	    $contragent_id   = $row["contragent_id"];
	    $contragent_name = $row["contragent_name"];
	    $shipment        = $row["shipment"];
	    $comments        = $row["comments"];
		$tags	     = $row["tags"]; 
	}
    
    if (isset($demo)) {
        $comments .= 'Демо-заказ';
    }
    
		
    // To do Для демо-заказа не высылать сообщение для заключения договора
?>    

<br />
<?php if ($mobile == 'false') { ?>
<script language="JavaScript" type="text/javascript">
	function submitForm()
	{
		window.open ('', 'newWin', 'scrollbars=no,status=no,location=no,menubar=no,width=300,height=150')
        document.nForm.nButton.disabled = true;		
		return document.nForm.submit();
	}
</script>
<!-- table border="0">
<tr>
	<td><form action="index.php?act=dogovor&amp;pricelist_id=<?php echo $price_id.$urladd; ?>" method="post" name="nForm" id="nForm" target="newWin"><button onclick="submitForm();" id="nButton">Заключить договор</button></form></td>
	<td><!-- Вернуться в прайс -></td> 
</tr>
</table -->
<br />
<?php } // if ($mobile == 'false')
?>
<br />
<?php if($_SESSION[customer] == 1){
$cod = $_SESSION[cod];
echo '<form action="index.php?act=customer&cod=$cod" method="post" name="addform" enctype="multipart/form-data">';
 }else{
echo  '<form action="index.php?act=step2&amp;pricelist_id='.$price_id.'" method="post" name="addform" enctype="multipart/form-data">';   
}?>
    <table border=0>
<tr>
	<td>ИНН:</td>
	<td><input type="text" maxlength="12" size="12" name="contragent_id" value="<?php echo $contragent_id; ?>"  class="step1"></td>
</tr>
<tr>
	<td>Наименование контрагента:</td>
	<td><input type="text" maxlength="500" size="24" name="contragent_name" value="<?php echo $contragent_name; ?>" class="step1"></td>
</tr>
<tr>
	<td>E-mail:</td>
	<td><input type="text" maxlength="500" size="24" name="email" value="<?php echo $user["email"]?>" class="step1"></td>
</tr>
<tr>
	<td>Условия доставки:</td>
	<td><input type="text" maxlength="500" size="24" name="shipment" class="step1" value="<?php echo $shipment; ?>"></td>
</tr>
<tr>
	<td>Примечания:</td>
    <?php if ($mobile == 'false') {?>
	<td><textarea cols="24" rows="4" wrap="soft" name="comments"><?php echo $comments; ?></textarea></td>
    <?php } else { ?>
    <td><input type="text" maxlength="500" size="24" name="comments" value="<?php echo $comments; ?>" class="step1"></td>
    <?php } ?>
</tr>
<tr>
	<td>Метка:</td>
	<td><input type="text" maxlength="255" size="24" name="tags" class="step1" value=""><br />
	<?php 
		if ($tags != "") echo 'Заказ сформирован по метке "'.$tags.'"'; ?>
	</td>
</tr>
<tr>
	<td>Отсрочить до:</td>
	<td><input type="text" maxlength="2" size="2" name="day" class="step1" value="">-<input type="text" maxlength="2" size="2" name="mon" class="step1" value="">-<input type="text" maxlength="4" size="4" name="year" class="step1" value="">&nbsp;дд-мм-гггг&nbsp;&nbsp;<input type="text" maxlength="2" size="2" name="hh" class="step1" value="">-<input type="text" maxlength="2" size="2" name="mm" class="step1" value="">&nbsp;чч-мм<br />
	
	</td>
</tr>
<tr>	
	<td colspan='2'><br /><input type="submit" value="Отправить заказ оператору" ></td>
</tr>
</table>
<script language="JavaScript" type="text/javascript">
	document.write('<input type="hidden" name=scr_width  value="' + screen.width  +'">');
	document.write('<input type="hidden" name=scr_height value="' + screen.height +'">');
</script>

</form>
<br>
<br>


<?php } else {

	echo "<br />&nbsp;Минимальный заказ для данного прайс-листа должен быть не менее ".$zakaz_limit."руб.";
		
	echo "<br />";



} // End if ($price_id > 0)

/*
if ($attributes[pricelist_id] != '') {
<a href="index.php?act=single_price&pricelist_id=<?php echo $attributes[pricelist_id].$urladd; " class="header2">Вернуться в прайс-лист</a><br>
 } else {
<a href="index.php?act=kabinet echo $urladd; " class="header2">Перейти в личный кабинет</a><br>
 } 
 */
 ?>