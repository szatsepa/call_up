<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include 'connect.php';

$query = "SELECT c.id, c.name, c.surname, c.patronymic, c.e_mail, c.phone FROM customer AS c WHERE c.`status` = 1";

$result = mysql_query($query);

$tmp = array();

while ($var = mysql_fetch_assoc($result)){
    $uid = $var[id];
    $res = mysql_query("SELECT SUM(`count`) AS deb FROM `wallet` WHERE `customer`=$uid AND `action`=1");
    $row = mysql_fetch_row($res);
    $deb = $row[0];
    $res = mysql_query("SELECT SUM(`count`) AS deb FROM `wallet` WHERE `customer`=$uid AND `action`=0");
    $row = mysql_fetch_row($res);
    $cred = $row[0];
    $ball = $deb - $cred;
    
    $var['ball'] = $ball;
    
    array_push($tmp, $var);
}

$out = array('list'=>$tmp);

echo json_encode($out);

mysql_close();
?>
