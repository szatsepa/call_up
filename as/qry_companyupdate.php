<?php

$name        = quote_smart(trim($attributes[name]));
$about       = quote_smart(trim($attributes[about]));
$full_about  = quote_smart(trim($attributes[full_about]));
$inn 		 = quote_smart(trim($attributes[inn]));
$user_id     = $user['id'];
$contragent  = quote_smart(trim($attributes[contragent]));

if (isset($attributes[demo]) and $attributes[demo] == 9) {
	$status = 9;
} else {
	$status = 1;
}

$query = "UPDATE companies 
			SET name        = $name,
			    about       = $about,
				full_about  = $full_about,
				time        = now(),
				user_id     = $user_id,
				status	    = $status,
				inn		    = '$inn',
				contragent  = $contragent
			WHERE id=$attributes[company_id]";
			
$qry_companyupdate = mysql_query($query) or die($query);
?>