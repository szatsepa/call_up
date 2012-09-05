<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

$pid = intval($_POST[pid]);

$id = intval($_POST[id]);

$query = "UPDATE cart SET artikul = 'NULL' WHERE id = $id AND price_id = $pid";

mysql_query($query);

$out = array('ok'=>NULL);

if(mysql_affected_rows()>0)$out['ok'] = 1;

echo json_encode($out);

mysql_close();
?>
