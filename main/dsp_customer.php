<?php

/*
 * create by arcady.1254
 */

    $row = query_customer($attributes[id], $attributes[stid]);
            
    $act    = "customer_update&id=".$row["id"];
    $submit = "Обновить информацию";
    
    $surname         = $row["surname"];
    $name            = $row["name"];
    $patronymic      = $row["patronymic"];
    $email           = $row["e_mail"];
    $phone           = $row["phone"];
    $shipping_address = $row["shipping_address"];	
    $desire = $row["desire"];

 ?>

 
<br>
<br>
<form action="index.php?act=<?php echo $act ?>" method="post" name="user_add">
    <input type="hidden" name="id" value="<?php echo $attributes[id]; ?>"/>
    
    <input type="hidden" name="stid" value="<?php echo $attributes[stid]; ?>"/>
<table border="0" cellpadding="0" cellspaciing="15">
<tr>
	<td>Фамилия</td>
	<td><input type="text" name="surname" size="50" maxlength="255" value="<?php echo $surname; ?>"/></td>
</tr>
<tr>
	<td>Имя</td>
	<td><input type="text" name="name" size="50" maxlength="255" value="<?php echo $name; ?>"/></td>
</tr>
<tr>
	<td>Отчество</td>
	<td><input type="text" name="patronymic" size="50" maxlength="255" value="<?php echo $patronymic; ?>"/></td>
</tr>
<tr>
	<td>Email</td>
	<td><input type="text" name="e_mail" size="50" maxlength="255" value="<?php echo $email; ?>"/></td>
</tr>
<tr>
	<td>Телефон</td>
	<td><input type="text" name="phone" size="50" maxlength="255" value="<?php echo $phone; ?>"/></td>
</tr>
<tr>
	<td>Адрес доставки</td>
	<td><input type="text" name="shipping_address" size="50" maxlength="255" value="<?php echo $shipping_address; ?>"/></td>
</tr>
<tr>
	<td>Пожелания</td>
	<td><input type="text" name="desire" size="50" maxlength="255" value="<?php echo $desire; ?>"/></td>
</tr>
<tr>
	<td></td>
	<td align="right"><input type="submit" value="<?php echo $submit; ?>"></td>
</tr>
</table>
</form>
