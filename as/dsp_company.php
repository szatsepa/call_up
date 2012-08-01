<?php

// Edit/update company form

if ($attributes[act]=='company_edit') {
    $row         = mysql_fetch_assoc($qry_company);
    $act         = "company_update&company_id=".$row["id"];
    $submit      = "Обновить информацию";
    $name        = $row["name"];
    $about       = $row["about"];
    $full_about  = $row["full_about"];
    $status      = $row["status"];
	$inn	     = $row["inn"];
	$contragent  = $row["contragent"];
	
    
} else {
    $act         = "company_add";
    $submit      = "Добавить компанию";
    $name        = "";
    $about       = "";
    $full_about  = "";
	$status		 = 0;
	$inn	     = "";
	$contragent  = "";

    
}

 ?>

<br>
<br>
<form action="index.php?act=<?php echo $act ?>" method="post" name="country_add">
<table>
<tr>
	<td>Наименование<br>компании</td>
	<td><input type="text" name="name" size="105" maxlength="255" value="<?php echo $name; ?>"></td>
</tr>
<tr>
	<td>Визитка</td>
	<td><textarea name="about" rows="3" cols="80" wrap="soft" ><?php echo $about; ?></textarea></td>
</tr>
<tr>
	<td>Информация<br>о компании</td>
	<td><textarea name="full_about" rows="5" cols="80" wrap="soft" ><?php echo $full_about; ?></textarea></td>
</tr>
<tr>
	<td>ИНН</td>
	<td><input type="text" name="inn" size="12" maxlength="12" value="<?php echo $inn; ?>"></td>
</tr>
<tr>
	<td>Наименование контрагента</td>
	<td><input type="text" name="contragent" size="105" maxlength="255" value="<?php echo $contragent; ?>"></td>
</tr>
<tr>
	<td></td>
	<td><input type="checkbox" name="demo" value="9" <?php if ($status == 9) echo "checked";?>> Демо-режим</td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
<tr>
	<td></td>
	<td align="right"><input type="submit" value="<?php echo $submit; ?>"></td>
</tr>
<tr>
	<td></td>
	<td></td>
</tr>
</table>
</form>