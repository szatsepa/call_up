<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if(!isset($_SESSION)){

    session_start();  
}

include 'connect.php';

$out = array(); 

$code = $_POST[cod];

$query = "SELECT c.id, c.artikul, p.str_group AS `group` FROM cart AS c, pricelist AS p WHERE c.artikul = p.str_code1 AND c.cod = $code";


if(!$_POST[cod]){
    
    $cid = $_SESSION[id];
    
    $query = "SELECT c.id, c.artikul, p.str_group AS `group` FROM cart AS c, pricelist AS p WHERE c.artikul = p.str_code1 AND c.customer = $cid";
}

$result = mysql_query($query);

$tmp_arr = array();

while ($var = mysql_fetch_assoc($result)){
    
    $w = substr($var['artikul'], 1);
    
    $var['weight'] = $w;
    
    array_push($tmp_arr, $var);
}

$out['return'] = $tmp_arr;

echo json_encode($out);

mysql_close();
?>
