<?php
// Обновление информации о прайсе

$price_id 					= intval($attributes[price_id]);
$comment	  				= quote_smart(trim($attributes[comment]));
$tags			 			= quote_smart(trim($attributes[tags]));
$rubrika				 	= intval($attributes[rubrika_id]);
$zakaz_limit				= intval($attributes[zakaz_limit]);

$query = "UPDATE price 
			 SET comment 	 = $comment,
				 tags	 	 = $tags,
				 rubrika 	 = $rubrika,
				 zakaz_limit = $zakaz_limit
		   WHERE id=$price_id";
		   
$qry_price_info_update = mysql_query($query) or die($query);

// Здесь установим сообщение об успешном обновлении информации
$eid = 2;


?>
