<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php'; 

$pid = intval($_POST[pid]);

$uid = intval($_POST[uid]);

$query = "SELECT Count(id) FROM cart WHERE customer = $uid AND artikul <> 'NULL' AND price_id = $pid";

$result = mysql_query($query);

$row = mysql_fetch_row($result);

$out = array('ok'=>$row[0]);

$query = "SELECT price_id AS pid FROM cart WHERE customer = $uid AND artikul <> 'NULL' GROUP BY price_id";

$result = mysql_query($query);

$tmp = array();

while ($row = mysql_fetch_assoc($result)){
    array_push($tmp, $row);
}

$out['prices'] = $tmp;

echo json_encode($out);

mysql_close();
?>
