<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

$uid = intval($_POST[uid]);

$out = array();

$out['uid'] = $uid; 

if($uid && $uid != 0){
    
    $query = "SELECT c.artikul, pl.str_group AS simbl FROM cart AS c, pricelist AS pl WHERE c.customer = $uid AND c.artikul = pl.str_code1";

    $out['query'] = $query; 

    $result = mysql_query($query);

    $tmp_array = array();

    while ($var = mysql_fetch_assoc($result)){
        array_push($tmp_array, $var);
    } 
    
    $out['cart'] = $tmp_array;
    
    $out['ok'] = 1;
    
}else{
    
    $out['ok'] = NULL;
    
}

echo json_encode($out); 

mysql_close();
?>
