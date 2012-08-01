<?php

// Выбирает e-mail поставщика текущего прайса 
// для не-демо компании

$query = "SELECT DISTINCT u.email 
		  FROM  price p,
		 	    companies c,
			    users u  
  		  WHERE p.company_id = c.id AND 
		        p.id = $pricelist_id AND 
        		u.company_id = p.company_id AND 
        		c.status > 0 AND 
				c.status < 9 AND 
				u.status > 0 AND 
        		u.role=2 LIMIT 1";
		
$qry_supplemail = mysql_query($query) or die($query);

?>