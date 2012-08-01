<?php
/*
 * created by arcady.1254@gmail.com 6.11.2011
 */
function qry_select_storefront($role, $cid)
{
    if($role == 6)$str="AND sd.company_id = $cid";
    
    $query = "SELECT s.id, s.name FROM storefront AS s, storefront_data AS sd WHERE s.id = sd.storefront_id $str GROUP BY s.id";
    
    $result = mysql_query($query) or die($query);
    
    $store_arr = array();
    
    while ($row = mysql_fetch_assoc($result)){
        array_push($store_arr, $row);
    }
    
    mysql_free_result($result);
    
    return $store_arr;
}

function storefront_name($id){
    
    $query = "SELECT name FROM storefront WHERE id = $id";
    
    $result = mysql_query($query) or die ($query);
    
    while ($qry_name = mysql_fetch_assoc($result)){
        
        $name = $qry_name[name];
        
        }
        
        mysql_free_result($result);
        
        return $name; 
    
}
?>
