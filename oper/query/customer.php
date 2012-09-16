<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

$uid = intval($_POST[uid]);

$query = "SELECT * FROM customer WHERE id = $uid";

$result = mysql_query($query);

$var = mysql_fetch_assoc($result);

$out = array('customer'=>$var);

echo json_encode($out);

mysql_close();
?>
