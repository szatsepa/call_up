<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

$uid = intval($_POST[uid]);

$query = "SELECT c.artikul, pl.str_group FROM cart AS c, pricelist AS pl WHERE c.customer = $uid AND c.artikul = pl.str_code1";

$out = array();

$out['query'] = $query; 

$result = mysql_query($query);

$tmp_array = array();

while ($var = mysql_fetch_assoc($result)){
    array_push($tmp_array, $var);
}

$out['cart'] = $tmp_array;

echo json_encode($out); 

mysql_close();
?>
