<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

//$uid = intval($_POST[uid]);

$query = "SELECT * FROM messages WHERE role=5";

$result = mysql_query($query);

$out = array();

$n = 0;
while ($var = mysql_fetch_assoc($result)){
    array_push($out, $var);
    $n++;
    if($n == 6){
        break;
    }
}

echo json_encode($out);

mysql_close();
?>
