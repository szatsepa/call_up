<?php

/*
 * created by arcady.1254@gmail.com 21/1/2012
 */
function art_Images($artikul){
    
    $tmp_array = array();
    
    $artikul = quote_smart($artikul);
    
    $query = "SELECT gp.id, gp.extention, gp.pictype FROM `goods_pic` AS gp, `pricelist` AS p WHERE gp.barcode = p.str_barcode AND p.str_code1 = $artikul AND gp.pictype = 1 AND p.pricelist_id = $_SESSION[pid]";
    
    $result = mysql_query($query) or die ($query);
    
    while ($var = mysql_fetch_assoc($result)){
        
        array_push($tmp_array, $var);
        
    }
    
    mysql_free_result($result);
    
    return $tmp_array;
    
}
?>
