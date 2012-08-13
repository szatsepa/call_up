<?php

/*
 * created by arcady.1245@gmail.com
 */
function rubrikasInStorefront($asid){
    
    $stid = quote_smart($asid);

$rub_arr = array();

$query = "SELECT r.id, r.name 
            FROM rubrikator AS r, price AS p, storefront_data AS s
            WHERE s.price_id = p.id
            AND p.rubrika = r.id
            AND s.storefront_id = $stid
            GROUP BY r.id";

$result = mysql_query($query) or die($query);

while ($row = mysql_fetch_assoc($result)){
    
    array_push($rub_arr, $row);
}

mysql_free_result($result);

return $rub_arr;     
}

?>
