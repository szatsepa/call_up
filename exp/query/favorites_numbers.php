<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

$price = intval($_POST[pid]);

$query = "SELECT str_code1 AS artikul, str_group AS simbl FROM pricelist WHERE pricelist_id = $price";

$result = mysql_query($query);

$out = array('ok'=>NULL,'query'=>$query);

$tmp = array();

while ($row = mysql_fetch_assoc($result)){
    array_push($tmp, $row);
}

$tmpf = array();

foreach ($tmp as $value) {
    $cnt = 5;
    if($value[simbl]=='B'){
        $cnt = 10;
    }else if($value[simbl]=='C'){
        $cnt = 15;
    }
    $query = "SELECT (COUNT(ag.`artikul`)/$cnt) AS hm, ag.artikul AS artikul, CONCAT(gp.id,'.',gp.extention) AS img  FROM `arch_goods`  AS ag , pricelist AS pl, goods_pic AS gp WHERE  ag.artikul = '$value[artikul]' AND ag.artikul = pl.str_code1 AND pl.str_barcode = gp.barcode";
    
    $result = mysql_query($query);
    
    while ($var = mysql_fetch_assoc($result)){ 
       
               array_push($tmpf, $var);
    }
}
rsort($tmpf);

reset($tmpf);

$n = 0;

foreach ($tmpf as $key => $value) {
    $out['artikles'][$key] = $value;
    $n++;
    if($n == 6){
                break;
     }
}

$out['query'] = $query;

echo json_encode($out);

mysql_close();
?>
