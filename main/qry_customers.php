<?php
// arcady.1254 31.10.2011

$sto = $attributes[stid];

$query = "SELECT * FROM customer AS cm WHERE cm.storefront = $sto ORDER BY cm.surname";

$qry_customers = mysql_query($query) or die($query);

?>
