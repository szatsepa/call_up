<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

$price = intval($_POST[pid]);

$query = "SELECT ag.`artikul`FROM `arch_goods` AS ag WHERE ag.`price_id`= $price GROUP BY ag.artikul";

$result = mysql_query($query);

$out = array('ok'=>NULL,'cnt'=>NULL);

$tmp = array();

while ($row = mysql_fetch_assoc($result)){
    array_push($tmp, $row);
}

$tmpf = array();

foreach ($tmp as $value) {
    $cnt = 1;
    if($value[simbl]=='B'){
        $cnt = 2;
    }else if($value[simbl]=='C'){
        $cnt = 3;
    }
    $query = "SELECT (COUNT(ag.`artikul`)/$cnt) AS hm, ag.artikul AS artikul, CONCAT(gp.id,'.',gp.extention) AS img  FROM `arch_goods`  AS ag , pricelist AS pl, goods_pic AS gp WHERE  ag.artikul = '$value[artikul]'AND pl.pricelist_id = $price AND ag.artikul = pl.str_code1 AND pl.str_barcode = gp.barcode";
    
    $result = mysql_query($query);
    
    while ($var = mysql_fetch_assoc($result)){  
       
               array_push($tmpf, $var);
    }
}
rsort($tmpf);

reset($tmpf);

$n = 0;

//$out['$query'] = $query;

foreach ($tmpf as $key => $value) {
    $out['artikles'][$key] = $value;
    $n++;
    if($n == 6){
                break;
     }
}

$query = "SELECT (COUNT(artikul)/30) FROM arch_goods WHERE price_id = $price";

$result = mysql_query($query);

$row = mysql_fetch_row($result);



if($row[0])$out['cnt'] = $row[0];

echo json_encode($out);

mysql_close();
?>
