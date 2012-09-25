<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

$order = intval($_POST[order]);

$query = "SELECT p.id,
                 a.artikul AS artikul, 
                 a.name, 
                 a.price_single,
                 a. amount,
                 a. discount ,
                 p.str_group AS simbl,
                 CONCAT(gp.id,'.',gp.extention) AS img
            FROM arch_goods AS a,
                 pricelist AS p,
                 goods_pic AS gp  
           WHERE a.zakaz = $order AND 
                 a.artikul = p.str_code1 AND 
                 p.str_barcode = gp.barcode AND 
                 gp.pictype = 1";

$result = mysql_query($query);

$out = array('ok'=>NULL);

$tmp = array();

while ($var = mysql_fetch_assoc($result)){   
    array_push($tmp, $var);
}

$out['ok'] = $tmp;

echo json_encode($out);

mysql_close();
?>
