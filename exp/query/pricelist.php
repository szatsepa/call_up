<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

$out = array('ok'=>NULL);

$query = "SELECT  pl.str_code1 AS artikul, 
                        pl.str_barcode AS barcode, 
                       CONCAT(gp.id,'.',gp.extention) AS img
                 FROM storefront AS s, 
                        storefront_data AS  sdt, 
                        price AS p, 
                        pricelist AS pl,
                        goods_pic AS gp
                    WHERE s.id = 2 
                    AND s.id = sdt.storefront_id 
                    AND sdt.price_id = p.id 
                    AND p.id = pl.pricelist_id 
                    AND pl.str_barcode = gp.barcode
        AND pl.str_code2 <> 'X'
        AND p.status <> 2
        AND gp.pictype = 1
        ORDER BY pl.str_barcode";

$result = mysql_query($query);

$tmp = array();

while ($var = mysql_fetch_assoc($result)){
    array_push($tmp, $var);
}

$out['pricelist'] = $tmp;

echo json_encode($out);

mysql_close();
?>
