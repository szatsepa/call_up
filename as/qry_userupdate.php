<?php

$attributes[surname] = quote_smart($attributes[surname]);
$attributes[name] = quote_smart($attributes[name]);
$attributes[patronymic] = quote_smart($attributes[patronymic]);
$attributes[company_id] = intval($attributes[company_id]);
$attributes[role] = intval($attributes[role]);
$attributes[email] = quote_smart($attributes[email]);
$attributes[phone] = quote_smart($attributes[phone]);
$attributes[role] = intval($attributes[role]);
$attributes[default_company] = intval($attributes[default_company]);
$attributes[id] = intval($attributes[id]);

$query = "UPDATE users 
			SET surname    = $attributes[surname],
			    name       = $attributes[name],
    			patronymic = $attributes[patronymic],
    			company_id = $attributes[company_id],
                role       = $attributes[role],
    			email      = $attributes[email],
    			phone      = $attributes[phone],
				time       =   now(),
				default_company =  $attributes[default_company],
				user_id    = ".$user['id']." 
			WHERE id = $attributes[id]";
			
$qry_userupdate = mysql_query($query) or die($query);
?>