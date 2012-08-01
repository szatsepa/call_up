<?php

/*
 * create by arcady.1254 1.11.2011
 */
function query_customer($arg, $storefront) {
    
    $arg = quote_smart($arg);
    
    $storefront = quote_smart($storefront);
    
    $query = "SELECT *
              FROM customer AS cu
              WHERE cu.id=$arg
               AND cu.storefront = $storefront";


$qry_user = mysql_query($query) or die($query);

$row = mysql_fetch_assoc($qry_user); 

return $row;
}
?>
