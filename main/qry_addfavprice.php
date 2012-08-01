<?php

$attributes[user_id] 	  = intval($attributes[user_id]);
$attributes[pricelist_id] = intval($attributes[pricelist_id]);

$query = "INSERT INTO kabinet 
(user_id,price_id)
VALUES 
($attributes[user_id],$attributes[pricelist_id])";
$qry_addfavprice = mysql_query($query) or die($query);

$javascript = "javascript:alert('Прайс-лист добавлен в избранное.');";

?>