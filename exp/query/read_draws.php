<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

$query = "SELECT * FROM draw";

$result = mysql_query($query);

$tmp = array();

while ($var = mysql_fetch_assoc($result)){
    array_push($tmp, $var);
}

$out = array('draws'=>$tmp); 

echo json_encode($out);

mysql_close();
?>
