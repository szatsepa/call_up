<?php 

$query = "SELECT id,name,status 
			FROM rubrikator 
			WHERE status=1
			ORDER BY id";
$qry_rubrikator = mysql_query($query) or die($query);

 ?>