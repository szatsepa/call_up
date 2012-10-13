<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

mysql_query("UPDATE tickets SET field_A = '$_POST[fA]', field_B = '$_POST[fB]', field_C = '$_POST[fC]' WHERE num_order = '$_POST[num_order]'");

$out = array('ok'=> mysql_affected_rows());

echo json_encode($out);

mysql_close();
?>
