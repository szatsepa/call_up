<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

$uid = intval($_POST[uid]);

$out = array();

$query = "SELECT a.str_code1 AS artikul,
                b.id,
		CONCAT(gp.id,'.',gp.extention) AS img,
    a.str_group AS simbl
         FROM pricelist a, cart b, price p,companies c, goods_pic gp
         WHERE a.str_code1 = b.artikul
           AND a.pricelist_id = b.price_id
           AND a.pricelist_id = p.id
    AND p.company_id=c.id
           AND gp.barcode = a.str_barcode
    AND gp.pictype = 1
           AND b.customer=$uid
           AND a.str_code2 <> 'X'
         ORDER BY b.id";

$result = mysql_query($query);

$tmp = array();

while ($var = mysql_fetch_assoc($result)){
    array_push($tmp, $var);
}

$out['cart'] = $tmp;

$out['ok'] = NULL;

if($result)$out['ok'] = 1;

echo json_encode($out);

mysql_close();
?>
