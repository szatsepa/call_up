<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

$uid = intval($_POST[uid]);

$pid = intval($_POST[pid]);

$out = array();

$out['uid'] = $uid; 

if($uid && $uid != 0){
    
    $query = "SELECT c.artikul, UPPER(SUBSTRING(c.artikul,1,1)) AS simbl FROM cart AS c WHERE c.customer = 1 AND c.price_id = $pid";

//    $out['query'] = $query; 

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
