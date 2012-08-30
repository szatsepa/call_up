<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

$yy = 2012;
if(isset($_POST[YY]))$yy = intval($_POST[YY]);
$mm = 1;
if(isset($_POST[MM]))$mm = intval($_POST[MM])+1;
$dd = 1;
if(isset($_POST[DD]))$dd = intval($_POST[DD]);

$L =  date("L", mktime(0, 0, 0, $mm, $dd, $yy));

$dy =  date("j", mktime(0, 0, 0, $mm, $dd, $yy));

$deys = date("t", mktime(0, 0, 0, 1, $dd, $yy)); 

$month = date("n", mktime(0, 0, 0, $mm, $dd, $yy));

$ye = date("Y", mktime(0, 0, 0, $mm, $dd, $yy));

//$month = $month-1; 

$out = array('deys'=>$deys,'month'=>$month,'year'=>$ye,'low'=>$L, 'dey'=> $dy, 'date'=>$str_out);

echo json_encode($out);

mysql_close();
?>
