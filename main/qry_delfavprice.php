<?php

$user     = $user["id"];
$price_id = intval($attributes[id]);

$query = "DELETE FROM kabinet 
          WHERE user_id  = $user AND 
                price_id = $price_id";
                
$qry_delfavprice = mysql_query($query) or die($query);

?>