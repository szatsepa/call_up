<?php 

$price_id = intval($attributes[price_id]);

$query = "DELETE FROM price WHERE id=$price_id";
$qry_pricedel = mysql_query($query) or die($query);

$query2 = "DELETE FROM pricelist WHERE pricelist_id=$price_id";
$qry_pricelistdel = mysql_query($query2) or die($query2);

$query = "DELETE FROM storefront_data WHERE price_id = $price_id";
$qry_st = mysql_query($query) or die ($query);

$attributes[query_str] = "act=prices&eid=20";

?>