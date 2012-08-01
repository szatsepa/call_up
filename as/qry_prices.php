<?php 
$company_id = intval($_SESSION[user][company_id]);

$query = "SELECT p.id,
     			 p.company_id,
				 c.name,
				 p.comment,
				 p.creation,
				 p.rubrika,
				 p.tags,
				 p.zakaz_limit
		  FROM price p, companies c
		  WHERE p.company_id=c.id
                  AND c.id = $company_id
          ORDER BY p.company_id,p.id";
$qry_prices = mysql_query($query) or die($query);

?>