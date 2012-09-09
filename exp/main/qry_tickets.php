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

$query = "SELECT price_id AS pid FROM tickets WHERE customer = $uid GROUP BY price_id";

$result = mysql_query($query) or die($query);

$pid_array = array();

while ($var = mysql_fetch_assoc($result)){
    array_push($pid_array, $var[pid]);
}

mysql_free_result($result);

$pictyre_array = array();

//print_r($pid_array);

foreach ($pid_array as $value) {
    
    $tmp = array();
    
            $query = "SELECT p.`str_code1`, CONCAT(g.id,'.',g.extention) AS img FROM `pricelist` AS p, goods_pic AS g WHERE  p.`pricelist_id`=$value AND p.`str_barcode` = g.barcode AND g.pictype = 1";

            $result = mysql_query($query) or die($query);

            while ($var = mysql_fetch_assoc($result)){
                $tmp[$var[str_code1]] = $var[img];
            }
            
            $pictyre_array[$value] = $tmp; 
            
            mysql_free_result($result);
}



//print_r($pictyre_array);
?>
