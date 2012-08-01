<?php 

$attributes[company_id] = intval($attributes[company_id]);

$query = "SELECT id,
				 name,
				 about,
				 full_about,
				 status,
				 inn,
				 contragent
		FROM companies 
		WHERE id=$attributes[company_id]";
$qry_company = mysql_query($query) or die($query);


?>