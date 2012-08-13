<?php

function count_Volume($name){
    
    $name = quote_smart($name);
    
    $query = "SELECT Count(id) FROM pricelist WHERE str_name =$name";
    
    $qry_count = mysql_query($query) or die($query);
    
    $row = mysql_fetch_row($qry_count);
    
    return $row[0];
    
    
}

function list_Volume($name){
    
    $name = quote_smart($name);
    
    $query = "SELECT `id`, `str_code1`, `str_barcode`,`str_code2` AS position FROM `pricelist` WHERE `str_name` = $name AND `str_code2` = 'v' ";
    
    $list_arr = array();
    
    $qry_list = mysql_query($query) or die ($query);
    
    while ($var = mysql_fetch_assoc($qry_list)){
        
        array_push($list_arr, $var);
    }
    
    mysql_free_result($qry_list);
    
    return $list_arr;
    
}
?>
