<?php

// Edit/update user form


if ($attributes[act] == 'user_edit') {
    
    $row = query_user($attributes[id]);
    //$row      = mysql_fetch_assoc($qry_user);
    
    $act    = "user_update&id=".$row["id"];
    $submit = "Обновить информацию";
    
    $surname         = $row["surname"];
    $name            = $row["name"];
    $patronymic 	 = $row["patronymic"];
    $company_id      = $row["company_id"];
    $email      	 = $row["email"];
    $phone           = $row["phone"];
    $role            = $row["role"];	
	$company_id_stor = $row["default_company"];
    
} else {
    $act        = "user_add";
    $submit     = "Добавить пользователя";
    
    $surname    	 = "";
    $name       	 = "";
    $patronymic 	 = "";
    $company_id 	 = "";
    $email      	 = "";
    $phone      	 = "";	
}

 ?>

 
<br>
<br>
<form action="index.php?act=<?php echo $act ?>" method="post" name="user_add">
<table border="0" cellpadding="0" cellspaciing="15">
<tr>
	<td>Роль</td>
	<td><?php include ("dsp_roleselect.php"); ?></td>
</tr>
<tr>
	<td>Компания</td>
	<td><?php include ("dsp_companyselect.php"); ?></td>
</tr>
<tr>
	<td>Фамилия</td>
	<td><input type="text" name="surname" size="50" maxlength="255" value="<?php echo $surname; ?>"></td>
</tr>
<tr>
	<td>Имя</td>
	<td><input type="text" name="name" size="50" maxlength="255" value="<?php echo $name; ?>"></td>
</tr>
<tr>
	<td>Отчество</td>
	<td><input type="text" name="patronymic" size="50" maxlength="255" value="<?php echo $patronymic; ?>"></td>
</tr>
<tr>
	<td>Email</td>
	<td><input type="text" name="email" size="50" maxlength="255" value="<?php echo $email; ?>"></td>
</tr>
<tr>
	<td>Телефон</td>
	<td><input type="text" name="phone" size="20" maxlength="20" value="<?php echo $phone; ?>"></td>
</tr>
<tr>
<?php 
if ($attributes[act] == 'user_edit') {
	$default_company = 'true';
	$company_id      = $company_id_stor;
} else {
	$default_company = 'true';
}
?>
	<td>Редирект</td>
	<td><?php include ("dsp_companyselect.php"); ?></td>
</tr>
<tr>
	<td></td>
	<td align="right"><input type="submit" value="<?php echo $submit; ?>"></td>
</tr>
</table>
</form>