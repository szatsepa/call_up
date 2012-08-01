<?php 

$error = "false";
$auth  = "false";

if (isset($attributes[code])) {
	if ($attributes[code] != "1234") {
		$error = "true";
	} else {
		$auth  = "true";
	}
}
if ($auth == "true" and $error == "false") {
	$title = "Оформление заказа. Дополнительная информация.";	
	}
?>
