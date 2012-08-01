<?php 

// Защита от робота
if ($authentication != "yes") exit();

ob_start (); 

$today = date("d.m.Y");

// Zakaz определяутся в add_zakaz.php
//$zakaz = mysql_insert_id();
//$zakaz = mysql_result($qry_id,0);

// Время отсроченного заказа
// Проверок здесь нет из-за демонстрационных целей
$exe_time = '';

if ($attributes[day] != '' and $attributes[mon] != '' and $attributes[year] != '') {

	$exe_time = $attributes[day]."-".$attributes[mon]."-".$attributes[year];
	
	if ($attributes[hh] != '' and $attributes[mm] != '') {
	
		$exe_time .= " ".$attributes[hh].":".$attributes[mm]; 
	
	} else {
	
		$exe_time .= " 00:00";
	
	}
	
}

?>

<table>
<tr>
	<td>N заказа:&nbsp;</td>
	<td><?php echo $zakaz; ?></td>
</tr>
<tr>
	<td>Дата:&nbsp;</td>
	<td><?php echo $today; ?></td>
</tr>
<tr>
	<td>Имя менеджера:&nbsp;</td>
	<td><?php echo $user["surname"]." ".$user["name"]." ".$user["patronymic"]; ?></td>
</tr>
<tr>
	<td>E-mail менеджера:&nbsp;</td>
	<td><?php echo $attributes[email]; ?></td>
</tr>
<tr>
	<td>Телефон менеджера:&nbsp;</td>
	<td><?php echo $user["phone"]; ?></td>
</tr>
<tr>
	<td>ИНН:</td>
	<td><?php echo $attributes[contragent_id]; ?></td>
</tr>
	<td>Наименование контрагента:</td>
	<td><?php echo $attributes[contragent_name]; ?></td>
</tr>
<tr>
	<td>Условия доставки:</td>
	<td><?php echo $attributes[shipment]; ?></td>
</tr>
<tr>
	<td>Комментарии:</td>
	<td><?php echo $attributes[comments]; ?></td>
</tr>
<tr>
	<td>Отсрочить до:</td>
	<td><?php echo $exe_time; ?></td>
</tr>
</table>
<br>

<?php
// Вывод содержимого корзины
include ("main/dsp_cart.php");

$output = ob_get_contents(); 
ob_end_flush();
$output = str_replace ("<table class='cart'>","<table cellspacing=0 cellpadding=4>.",$output);
$output = str_replace ("<table>","<table cellspacing=0 cellpadding=4>.",$output);
?>
<br>
<br>
<br>


<?php
// multiple recipients
$to  = 'djv57@yandex.ru';

$demalert = '';

if (isset($demo)) {
    $demalert = '[Демо-заказ] ';
} 

// Отправляем письмо также и поставщику (если можно)
if (mysql_num_rows($qry_supplemail) == 1) {	
	$add_email = ",". mysql_result($qry_supplemail,0);
} else {
	$add_email = '';
}

// subject
$subject = $demalert.'Уведомление о заказе N'.$zakaz;

// message
$message = "<html><head><STYLE TYPE='text/css'>BODY {font-family:sans-serif;} TABLE {border:solid 1px gray;} TH {border:solid 1px gray;} TD {border:solid 1px gray;}</STYLE></head><body>".$output;
//$message .= "<br>&nbsp;&nbsp;<form action='http://100ok.ru' method='get'><input type='Submit' value='Подтвердить заказ'></form>";
$message .=" </body></html>";

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

// To do $attributes[email]!!! Подумать о безопасности

// Additional headers
$headers .= 'To: '.$attributes[email]."\r\n";
$headers .= 'From: noreply@call-up.ru' . "\r\n";
$headers .= 'Bcc: djv57@yandex.ru, operator@call-up.ru' . $add_email . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);
?>