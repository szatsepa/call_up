<?php

/*
 * created by arcady.1254@gmail.com 7.11.2011
 */
function qry_companies($storefront_id){
    
    $com_arr = array();
    
    $query = "SELECT s.id, 
                     s.name,
                     sd.company_id, 
                     (SELECT name FROM companies WHERE id=sd.company_id) AS company, 
                     sd.price_id, 
                     (SELECT comment FROM price WHERE id = sd.price_id) AS price 
                 FROM storefront AS s, 
                      storefront_data AS sd  
                WHERE s.id = $storefront_id 
                AND s.id = sd.storefront_id 
                GROUP BY sd.company_id";
 
    $result = mysql_query($query) or die ($query);
    
    while ($var = mysql_fetch_assoc($result)){
        array_push($com_arr, $var);
    }
    return $com_arr;
 }
function  qry_about_storefronts($storefront_id){
    
    $query = "SELECT s.id, 
                     s.name, 
                     sd.company_id, 
                    (SELECT name FROM companies WHERE id=sd.company_id) AS company, 
                     sd.price_id, 
                    (SELECT comment FROM price WHERE id = sd.price_id) AS price 
             FROM storefront AS s, storefront_data AS sd  
             WHERE s.id = $storefront_id AND s.id = sd.storefront_id";

    $result = mysql_query($query) or die($query); 
    
    $store_arr = array();
    
    while ($row = mysql_fetch_assoc($result)){
        
        array_push($store_arr, $row);
                
    }
    
    return $store_arr;
}
function qry_about_all_stopefront()
{
    $query = "SELECT s.id, 
                     s.name 
                     FROM storefront AS s";
    
    $store_arr = array();
    
    $result = mysql_query($query) or die ($query);
    
    while ($row = mysql_fetch_assoc($result)){
        
        array_push($store_arr, $row);
        
    }
    
    return $store_arr;
    
}

?>
