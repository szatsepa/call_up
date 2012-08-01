<?php

function count_Volume($name){
    
    $name = quote_smart($name);
    
    $query = "SELECT Count(id) FROM pricelist WHERE str_name =$name";
    
    $qry_count = mysql_query($query) or die($query);
    
    $row = mysql_fetch_row($qry_count);
    
    return $row[0];
    
    
}
?>
