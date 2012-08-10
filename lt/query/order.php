<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

$id = intval($_POST[id]);

$query = "SELECT a.time, t.field_A, t.field_B, t.field_C, t.num_order, a.shipment, a.comments, a.phone FROM tickets AS t, arch_zakaz AS a WHERE t.num_order = $id AND t.num_order = a.id";

$result = mysql_query($query);

$row = mysql_fetch_assoc($result);

//$out = array('ticket'=>$row);

echo json_encode($row);

mysql_close();
?>
