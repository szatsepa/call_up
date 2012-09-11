<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

$uid = intval($_POST[uid]);

$query = "SELECT * FROM wallet WHERE customer = $uid";

$result = mysql_query($query);

$tmp = array();

while ($var = mysql_fetch_assoc($result)){
    array_push($tmp, $var);
}

$out = array('wallet'=>$tmp); 

echo json_encode($out);

mysql_close();
?>
