<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$customer = intval($_SESSION[id]);

$query = "SELECT DISTINCT a.id, 
                          DATE_FORMAT(a.time, '%d.%m.%y') zakaz_date,
						  a.status,
                       g.price_id,
                          p.comment price_name,
                          u.surname,
						  a.tags
          FROM arch_zakaz AS a,
arch_goods AS g,
               price AS p,
               customers AS u
          WHERE u.id=a.customer AND a.customer = $customer AND
                a.id=g.zakaz AND 
                p.id=g.price_id AND p.id = 27
          ORDER BY id DESC";

$result = mysql_query($query) or die($query);

$orderlist = array();

while ($var = mysql_fetch_assoc($result)){
    array_push($orderlist, $var);
}

mysql_free_result($result);
?>
