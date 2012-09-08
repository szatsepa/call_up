<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

$simbl = $_POST[simbl];

$pid = intval($_POST[pid]);

$out = array('ok'=>NULL); 

$query = "SELECT  pl.str_code1 AS artikul, 
                       CONCAT(gp.id,'.',gp.extention) AS img
                 FROM   pricelist AS pl,
                        goods_pic AS gp
                    WHERE pl.str_barcode = gp.barcode
        AND pl.str_code2 <> 'X'
        AND gp.pictype = 1
        AND pl.str_group = '$simbl'
        AND pl.pricelist_id = $pid 
        ORDER BY pl.id";

$result = mysql_query($query);

$tmp = array();

while ($var = mysql_fetch_assoc($result)){
//    $tmp[$var[artikul]] = $var[img];
    array_push($tmp, $var);
}

if($result)$out['ok']=1;

    $out['simbls'] = $tmp;
    
    $out['query']=$query;

echo json_encode($out);

mysql_close();
?>
