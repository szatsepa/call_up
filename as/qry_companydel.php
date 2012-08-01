<?php 

$attributes[company_id] = intval($attributes[company_id]);

$query = "UPDATE companies 
			SET time=now(),
				user_id=".$user['id'].",
				status=0
			WHERE id=$attributes[company_id]";
			
$qry_companydel = mysql_query($query) or die($query);

$javascript = "javascript:alert('Компания заблокирована');";

// ToDO сделать удаление логотипа при удалении компании ???
// Блокировать всех пользователей ???


?>