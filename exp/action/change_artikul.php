<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

//$uid = intval($_POST[uid]);

$id = intval($_POST[id]);

//$artikul = $_POST[artikul];

//$query = "DELETE FROM cart WHERE id = $id";

$query = "UPDATE cart SET artikul = 'NULL' WHERE id = $id";

mysql_query($query);

$out = array('ok'=>NULL);

if(mysql_affected_rows()>0)$out['ok'] = 1;

echo json_encode($out);

mysql_close();
?>
