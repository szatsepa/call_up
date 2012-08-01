<?php 

$attributes[rubrika_id] = intval($attributes[rubrika_id]);
$attributes[price_id] = intval($attributes[price_id]);

$query = "UPDATE price 
SET rubrika=$attributes[rubrika_id] 
WHERE id=$attributes[price_id]";
$qry_pricerubrikaupd = mysql_query($query) or die($query);

// Здесь установим сообщение об успешном обновлении информации
$eid = 2;
?>