<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

$uid = intval($_POST[uid]);

$query = "SELECT Count(id) FROM cart WHERE customer = $uid AND artikul <> 'NULL'";

$result = mysql_query($query);

$row = mysql_fetch_row($result);

$out = array('ok'=>$row[0]);

echo json_encode($out);

mysql_close();
?>
