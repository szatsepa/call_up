<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$uid = $_SESSION[id];

$query = "SELECT * FROM tickets WHERE customer = $uid";

//echo $query."<br/>";

$result = mysql_query($query) or die($query);

$tickets_array = array();

while ($var = mysql_fetch_assoc($result)){
    array_push($tickets_array, $var);
}

mysql_free_result($result);

$query = "SELECT p.`str_code1`, CONCAT(g.id,'.',g.extention) AS img FROM `pricelist` AS p, goods_pic AS g WHERE  p.`pricelist_id`=2 AND p.`str_barcode` = g.barcode AND g.pictype = 1";

$result = mysql_query($query) or die($query);

$pictyre_array = array();

while ($var = mysql_fetch_assoc($result)){
    $pictyre_array[$var[str_code1]] = $var[img];
}

mysql_free_result($result);


?>
