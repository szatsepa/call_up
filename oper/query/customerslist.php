<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

$query = "SELECT * FROM customer WHERE `status` = 1";

$result = mysql_query($query);

$tmp = array();

while ($var = mysql_fetch_assoc($result)){
    array_push($tmp, $var);
}

$out = array('list'=>$tmp);

echo json_encode($out);

mysql_close();
?>
