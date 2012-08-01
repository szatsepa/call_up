<?php 

$query = "DELETE FROM advert WHERE id LIKE 'tovar%'";
$qry_tovardel = mysql_query($query) or die($query);

$query = "INSERT INTO advert (id) VALUES ('tovar".$attributes[id]."')";
			
$qry_tovaradd = mysql_query($query) or die($query);


$error = "&error=ok";
?>