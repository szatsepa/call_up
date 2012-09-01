<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

//$uid = intval($_POST[uid]);

$id = intval($_POST[id]);

$query = "DELETE FROM tickets WHERE id = $id";

mysql_query($query);

$out = array('ok'=>NULL,'query'=>$query);

if(mysql_affected_rows())$out['ok'] = 1;

echo json_encode($out);

mysql_close();
?>
