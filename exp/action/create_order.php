<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

$out = array('ok'=>NULL);

$pid = intval($_POST[pid]);

$uid = intval($_POST[uid]);

$sector_A = $_POST[A];

$sector_B = $_POST[B];

$sector_C = $_POST[C];

$num_order = $_POST[num];

$query = "INSERT INTO tickets (customer,field_A,field_B,field_C,num_order,price_id) VALUES ($uid,'$sector_A','$sector_B','$sector_C','$num_order',$pid)";

mysql_query($query);

$ins= mysql_insert_id();

if($ins){  
    
    $query = "DELETE FROM cart WHERE customer = $uid AND price_id = $pid";
    
    mysql_query($query);
    
}   

$out['ok'] = $ins;

$out['query'] = $query;

echo json_encode($out);

mysql_close();
?>
