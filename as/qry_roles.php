<?php 

$query = "SELECT id,name
			FROM roles  
			ORDER BY id";
$qry_roles = mysql_query($query) or die($query);

?>