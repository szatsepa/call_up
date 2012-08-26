<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

$out = array('ok'=>NULL);

$uid = intval($_POST[uid]);

$sector_A = $_POST[A];

$sector_B = $_POST[B];

$sector_C = $_POST[C];

$num_order = $_POST[num];

$query = "INSERT INTO tickets (customer,field_A,field_B,field_C,num_order) VALUES ($uid,'$sector_A','$sector_B','$sector_C','$num_order')";

mysql_query($query);

if(mysql_insert_id()>0){
    
    $query = "DELETE FROM cart WHERE customer = $uid";
    
    mysql_query($query);
    
    if(mysql_affected_rows())$out['ok'] = 1;
}

$out['query'] = $query;

echo json_encode($out);

mysql_close();
?>
