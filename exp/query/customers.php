<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

$query = "SELECT * FROM customer";

$result = mysql_query($query);

$out = array();

while ($var = mysql_fetch_assoc($result)){
    array_push($out, $var);
}

echo json_encode($out);

mysql_close();
?>
