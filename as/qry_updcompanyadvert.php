<?php 

$attributes[company_id] = intval($attributes[company_id]);

// Уберем старое значение
$query = "DELETE FROM advert WHERE id LIKE 'company%'";
$qry_companyadvertdel = mysql_query($query) or die($query);

$query = "INSERT INTO advert SET id='company$attributes[company_id]'";
$qry_updcompanyadvert = mysql_query($query) or die($query);


?>