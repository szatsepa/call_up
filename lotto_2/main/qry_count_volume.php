<?php

function count_Volume($name, $price_id){
    
    $name = quote_smart($name);
    
    $price_id = intval($price_id);
    
    $query = "SELECT Count(id) FROM pricelist WHERE str_name =$name AND pricelist_id = $price_id";
    
    $qry_count = mysql_query($query) or die($query);
    
    $row = mysql_fetch_row($qry_count);
    
    return $row[0];
    
    
}

function list_Volume($name,$price_id){
    
    $name = quote_smart($name);
    
    $query = "SELECT  `str_volume`, `id`, `str_code1`, `str_barcode`,`str_code2` AS position FROM `pricelist` WHERE `str_name` = $name AND pricelist_id = $price_id AND `str_code2` = 'v' ORDER BY `str_volume`";
    
    $list_arr = array();
    
//    echo "$query<br/>";
    
    $qry_list = mysql_query($query) or die ($query);
    
    while ($var = mysql_fetch_assoc($qry_list)){
        
        array_push($list_arr, $var);
    }
    
    mysql_free_result($qry_list);
    
//    natcasesort($list_arr);
    
    return $list_arr;
    
}
?>
