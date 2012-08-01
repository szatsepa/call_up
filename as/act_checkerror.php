<?php 
// Здесь устанавливаются сообщения об ошибках в системе

if (isset($attributes[eid])) {

	$error_id = intval($attributes[eid]);
	
	switch ($error_id) {
	    
	    case "1":
		$error_message = "Пользователь добавлен";
		break;
		
		case "2":
		$error_message = "Информация обновлена";
		break;
		
		case "10":
		$error_message = "Товары добалены";
		break;
		
		case "20":
		$error_message = "Прайс-лист удален";
		break;
	}
	
	$javascript = "javascript:alert('".$error_message."');";
}
?>