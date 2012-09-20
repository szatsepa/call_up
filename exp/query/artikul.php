<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include 'connect.php';

$pid = intval($_POST[pid]);
 
$artikul = $_POST[artikul];

$query = "SELECT num_price_single AS price FROM pricelist WHERE pricelist_id = $pid AND str_code1 = '$artikul'";

$result = mysql_query($query);

$row = mysql_fetch_assoc($result);

$out = array('price'=>$row[price]);

echo json_encode($out);

mysql_close();
?>
