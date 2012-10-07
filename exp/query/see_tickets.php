<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

$uid = $_POST[uid];

$date = $_POST[dt];

$result = mysql_query("SELECT a.id, 
                          a.c_number
                      FROM arch_zakaz AS a,
                           price AS p
                      WHERE a.customer=$uid
                        AND p.id=2
                        AND TO_DAYS('$date') - TO_DAYS(a.`period_date` ) <= 7");

$tmp = array();

while ($var = mysql_fetch_assoc($result)){
    array_push($tmp, $var);
}

$out = array('tickets'=>$tmp);

unset($tmp);

echo json_encode($out);

mysql_close();

?>
