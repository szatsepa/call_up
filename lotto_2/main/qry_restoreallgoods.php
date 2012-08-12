<?php
$user_for_select    = $_SESSION[user][id];
$price_id = intval($_SESSION[price_id]);

//if (!isset($demo)) {}
    $quer = "UPDATE pricelist p
    		 RIGHT JOIN cart c ON p.pricelist_id=$price_id
    		 AND p.str_code1=c.artikul
    		 AND c.customer = $user_for_select
    		 SET p.num_amount = p.num_amount + c.num_amount";
    		 
    $qry_update = mysql_query($quer) or die($quer);
    
    echo "$quer<br/>";

?>