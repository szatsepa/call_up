<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

$tid = intval($_POST[tid]);

$result = mysql_query("SELECT artikul FROM arch_goods WHERE zakaz = $tid");

$str_A = $str_B = $str_C = '';

while ($var = mysql_fetch_assoc($result)){
    $simbl = substr($var[artikul], 0,1);
    if($simbl == 'a')$str_A .= substr ($var[artikul], 1,2).' ';
    if($simbl == 'b')$str_B .= substr ($var[artikul], 1,2).' ';
    if($simbl == 'c')$str_C .= substr ($var[artikul], 1,2).' ';
}

$out = array('A'=>$str_A,'B'=>$str_B,'C'=>$str_C);

echo json_encode($out);

mysql_close();
?>
