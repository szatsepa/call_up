<?php

if (isset($attributes[status]) and 
    isset($attributes[pricelist_id])) {

    $attributes[status]       = intval($attributes[status]);
    $attributes[pricelist_id] = intval($attributes[pricelist_id]);
    
    $query = "UPDATE price
              SET status = $attributes[status] 
              WHERE id   = $attributes[pricelist_id]";	
    
    $qry_setpricestatus = mysql_query($query) or die($query);
    
    // Если прайс удаляется или блокируется, то удалим из корзины все заказы, 
    // имеющие к нему отношение 
	// To do при удалении всех заказов обновить остатки???
    if ($attributes[status] == 0 or $attributes[status] == 2) {
        $query2 = "DELETE FROM cart 
                   WHERE price_id = $attributes[pricelist_id]";
        $qry_delzakazforprice = mysql_query($query2) or die($query2); 
    }
}
?>