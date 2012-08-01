<?php 

$attributes[id] = intval($attributes[id]);

$query = "UPDATE rubrikator 
			SET time=now(),
				user_id=".$user['id'].",
				status=0
			WHERE id=$attributes[id]";
			

$qry_rubrikadel = mysql_query($query) or die($query);

//$javascript = "javascript:alert('Компания удалена');";

// ToDO разобраться с прайсами после удаления рубрики 

?>