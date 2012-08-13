<?php

/*
 * created by arcady.1254@gmail.com
 */
$stid = intval($attributes[stid]);

$advert_array = array();


$res = mysql_query("SELECT id FROM advert_company WHERE status = 1 ORDER BY id");

while ($row = mysql_fetch_assoc($res)){ 
    
    $tmp_arr = array();
    
    $query = "SELECT * FROM storefront_reklama WHERE storefront_id = $stid AND company_id = $row[id] ORDER BY company_id";

    $result = mysql_query($query) or die($query);

    while ($var = mysql_fetch_assoc($result)){

    
        array_push($tmp_arr, $var);
    
    }
    
    array_push($advert_array, $tmp_arr);
    
    unset ($tmp_arr);    

   mysql_free_result($result); 
}

mysql_free_result($res);

?>
