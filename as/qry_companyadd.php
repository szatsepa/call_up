<?php 

// status 1 - компания активна
// status 0 - заблокирована
// status 9 - Демо-режим

$name        = quote_smart(trim($attributes[name]));
$about       = quote_smart(trim($attributes[about]));
$full_about  = quote_smart(trim($attributes[full_about]));
$user_id     = $user['id'];
$inn	     = quote_smart(trim($attributes[inn]));
$contragent  = quote_smart(trim($attributes[contragent]));


if (isset($attributes[demo]) and $attributes[demo] == 9) {
	$status = 9;
} else {
	$status = 1;
}

$query = "INSERT INTO companies 
			(name,
			 about,
			 full_about,
			 creation,
			 time,
			 user_id,
			 status,
			 inn,
			 contragent) 
		  VALUES 
		  	($name,
			 $about,
			 $full_about,
			  now(),
			  now(),
			 $user_id,
			 $status,
			 '$inn',
			 $contragent)";
			  
$qry_companyadd = mysql_query($query) or die($query);

$javascript = "javascript:alert('Компания успешно добавлена');";

?>