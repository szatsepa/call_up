<?php

/*
 * created by arcady.1254@gmail.com
 */

$stid = intval($attributes[stid]);

$company_id = intval($attributes[company_id]);

$query = "SELECT * FROM storefront_reklama WHERE storefront_id = $stid AND company_id = $company_id";

$result = mysql_query($query) or die($query); 

$img_array = array();

while ($var = mysql_fetch_assoc($result)){
    
    array_push($img_array, $var);
    
}

mysql_free_result($result);

?>
