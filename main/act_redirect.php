<?php
// Здесь осуществляются манипуляции, связанные с редиректом пользователя по причине его текущих прав в системе

// Для мобильного пользователя редирект на default_company
if ($mobile == 'true' and $user["role"] == 3 and $user["default_company"] > 0) {	
	
	// Редиректим после авторизации
	if (!isset($attributes[act]) or $attributes[act] == '') {
		header ("location:index.php?act=company_prices&company_id=".$user["default_company"].$urladd);
	} 
	
	// Редиректим, если пользователь пытается войти в другую компанию
	if (isset($attributes[company_id]) and $attributes[company_id] != $user["default_company"]) {
		header ("location:index.php?act=company_prices&company_id=".$user["default_company"].$urladd);
	}
}



?>