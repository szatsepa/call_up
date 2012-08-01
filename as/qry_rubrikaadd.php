<?php 

$attributes[name] = quote_smart($attributes[name]);

$query = "INSERT INTO rubrikator 
			(id,
			 name,
			 creation,
			 time,
			 user_id,
			 status) 
		   SELECT MAX(id)+1,
		         $attributes[name],
				  now(),
			 	  now(),".
			 	  $user['id'].",
			 	  1 
		    FROM rubrikator";
			
$qry_rubrikaadd = mysql_query($query) or die($query);

?>