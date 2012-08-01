<?php 

$attributes[price_id] = intval($attributes[price_id]);
$attributes[tags] = quote_smart(trim($attributes[tags]));

$query = "UPDATE price 
SET tags=$attributes[tags] 
WHERE id=$attributes[price_id]";

$qry_tagsadd = mysql_query($query) or die($query);

// Здесь установим сообщение об успешном обновлении информации
$eid = 2;

?>