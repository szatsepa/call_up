<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include '../query/connect.php';

$uid = intval($_POST[uid]);

$stype = intval($_POST[stype]);

$count = $_POST[count];

$date_doc = $_POST[date_doc];

$num_doc = $_POST[num_doc];

$doc = $_POST[doc];

mysql_query("INSERT INTO `wallet` (`customer`, `count`, `num_doc`, `date_doc`, `doc`, `action`) VALUES ($uid,'$count','$num_doc','$date_doc','$doc',$stype)");

$res = mysql_query("SELECT SUM(`count`) AS deb FROM `wallet` WHERE `customer`=$uid AND `action`=1");
$row = mysql_fetch_row($res);
$deb = $row[0];

$res = mysql_query("SELECT SUM(`count`) AS deb FROM `wallet` WHERE `customer`=$uid AND `action`=0");
$row = mysql_fetch_row($res);
$cred = $row[0];

$ball = $deb - $cred;

$out = array('ins' => mysql_insert_id(),'ball' => $ball);

echo json_encode($out);

mysql_close();
?>
