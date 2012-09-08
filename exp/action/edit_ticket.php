<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

$field = $_POST[field];

$position = intval($_POST[position]);

$old_artikul = $_POST[old_artikul];

$new_artikul = $_POST[new_artikul];

$order = intval($_POST[order]); 

$query = "SELECT $field FROM tickets WHERE id = $order"; 

$result = mysql_query($query);

$row = mysql_fetch_row($result);

$tmp = explode(':', $row[0]);

$tmp[$position] = $new_artikul;

$tmp_str = implode(':', $tmp);

//$str = str_replace($old_artikul, $new_artikul, $row[0]);

$query = "UPDATE tickets SET $field = '$tmp_str' WHERE id = $order"; 

mysql_query($query);

$out = array('ok'=>NULL,'field'=>$tmp_str,'artikul'=>"$position na $new_artikul");

echo json_encode($out);

mysql_close();
?>
