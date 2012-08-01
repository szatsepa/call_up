<?php

/*
 * created by arcady.1254 7.11.2011
 */

$storefront_id = quote_smart($attributes[stid]);

$query = "DELETE FROM storefront_data WHERE storefront_id = $storefront_id";

$result = mysql_query($query) or die($query);

$query = "DELETE FROM storefront WHERE id = $storefront_id";
    
    $result = mysql_query($query) or die($qyery);
    
    header("location:index.php?act=strf");
//if(mysql_affected_rows()!=0){}


?>
 