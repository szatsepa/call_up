<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include '../query/connect.php';

$id = intval($_POST[uid]);

$query = "INSERT INTO tickets (customer, field_A, field_B, field_C) VALUES ($id, '$_POST[A]','$_POST[B]','$_POST[C]')";

mysql_query($query);

$ins = mysql_insert_id();

$out = array('ok'=>NULL,'query'=>$query, 'ticket'=>$ins);

if($ins){
  $out['ok'] = 1;  
}

echo json_encode($out);

mysql_close();
?>
