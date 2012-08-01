<?php 

$attributes[role] = intval($attributes[role]);

$query = "INSERT INTO messages (creation,time,role) 
          VALUES (now(),now(),$attributes[role])";
$qry_priceadd = mysql_query($query) or die($query);

?>