<?php 

$attributes[id] = intval($attributes[id]);

$query = "UPDATE users 
			SET time=now(),
				user_id=".$user['id'].",
				status=0
			WHERE id=$attributes[id]";
			

$qry_userdel = mysql_query($query) or die($query);

$javascript = "javascript:alert('Пользователь заблокирован');";

?>