<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

$price = intval($_POST[pid]);

$page = intval($_POST[page]);

$simbl = 'a';

if($page == 2){
    $simbl='b';
}else if($page == 3){
    $simbl = 'c';
}

$query = "SELECT SUBSTRING(artikul,-2) AS N FROM arch_goods WHERE price_id = $price GROUP BY N";

$result = mysql_query($query);

$out = array('cnt'=>NULL);

$tmp = array();

while ($row = mysql_fetch_assoc($result)){
    array_push($tmp, $row);
}

$tmpf = array();

foreach ($tmp as $value) {
   
    $query = "SELECT (COUNT(SUBSTRING(ag.`artikul`,-2))) AS hm,
                        '$simbl$value[N]' AS artikul, 
                        (SELECT CONCAT(id,'.',extention) AS img 
                           FROM goods_pic 
                           WHERE 
                                (SELECT str_barcode FROM pricelist WHERE str_code1 = '$simbl$value[N]' AND pricelist_id = $price) = barcode) AS img 
                    FROM   arch_goods  AS ag , pricelist AS pl 
                    WHERE  ag.artikul LIKE '%$value[N]' AND
                           pl.pricelist_id = 2 AND
                           ag.artikul = pl.str_code1";
    
    $result = mysql_query($query);
    
    while ($var = mysql_fetch_assoc($result)){  
       
               array_push($tmpf, $var);
    }
}
rsort($tmpf);

reset($tmpf);

$n = 0;

//$out['query'] = $tmpf;

foreach ($tmpf as $key => $value) {
    $out['artikles'][$key] = $value;
    $n++;
    if($n == 6){
                break;
     }
}

$out['page'] = $page; 

echo json_encode($out);

mysql_close();
?>
