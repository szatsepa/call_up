<?php
$user_for_select    = $user["id"];
$attributes[pricelist_id] = intval($attributes[pricelist_id]);

if (!isset($demo)) {
    $quer = "UPDATE pricelist p
    		 RIGHT JOIN cart c ON p.pricelist_id=$attributes[pricelist_id]
    		 AND p.str_code1=c.artikul
    		 AND c.user_id = $user_for_select
    		 SET p.num_amount = p.num_amount + c.num_amount";
    		 
    $qry_update = mysql_query($quer) or die($quer);
}
?>