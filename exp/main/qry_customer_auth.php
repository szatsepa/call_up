<?php

$pwd = quote_smart($attributes[code]);

$query = "SELECT id 
FROM customer
WHERE secret_key=$pwd";


$qry_customauth = mysql_query($query) or die($query);

?>