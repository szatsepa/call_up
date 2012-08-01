<?php

$user    = $user["id"];
$artikul = quote_smart($attributes[artikul]);

if (!isset($demo)) {
    $quer = "UPDATE pricelist p
    		 RIGHT JOIN cart c ON p.pricelist_id=c.price_id
    		 AND p.str_code1=$artikul
    		 AND c.user_id = $user
    		 SET p.num_amount = p.num_amount + c.num_amount";
    		 
    $qry_update = mysql_query($quer) or die($quer);
}


$quer = "DELETE FROM cart WHERE user_id=$user AND artikul=$artikul";
$qry_emptycart = mysql_query($quer) or die($quer);

?>