<?php

$attributes[name] = quote_smart($attributes[name]);
$attributes[id] = intval($attributes[id]);

$query = "UPDATE rubrikator 
			SET name=$attributes[name], 
			time=now(),
			user_id=".$user['id']." 
			WHERE id=$attributes[id]";

$qry_rubrikaupdate = mysql_query($query) or die($query);

?>