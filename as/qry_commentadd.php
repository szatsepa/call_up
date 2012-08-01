<?php 
$price_name  = quote_smart(trim($attributes[comment]));

$query = "UPDATE price 
		  SET comment=$price_name 
		  WHERE id=$attributes[price_id]";
$qry_commentadd = mysql_query($query) or die($query);

// Здесь установим сообщение об успешном обновлении информации
$eid = 2;

?>