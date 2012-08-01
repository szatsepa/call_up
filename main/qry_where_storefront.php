<?php

/*
 * created by arcady.1254@gmail.com
 */

function whereS($id){
    
    $query = "SELECT where_res FROM storefront WHERE id = $id";
    
    $result = mysql_query($query) or die($query);
    
    $row = mysql_fetch_assoc($result);
    
    $where = $row[where_res];
    
    mysql_free_result($result);
    
    return $where;
    
}
?>
