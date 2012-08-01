<?php

// Edit/update company form

if ($attributes[act]=='rubrika_edit') {
    $row        = mysql_fetch_assoc($qry_rubrika);
    $act        = "rubrika_update&id=".$row["id"];
    $submit     = "Изменить наименование";
    $name       = $row["name"];
    
} else {
    $act        = "rubrika_add";
    $submit     = "Добавить рубрику";
    $name       = "";
}

 ?>

<br>
<br>
<form action="index.php?act=<?php echo $act ?>" method="post" name="rubrika_add">
<table>
<tr>
	<td valign="top">Наименование<br>рубрики</td>
	<td valign="top"><input type="text" name="name" size="105" maxlength="255" value="<?php echo $name; ?>"></td>
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