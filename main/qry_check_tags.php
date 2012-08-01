<?php
// Осуществляется проверка, есть ли текущий тег в истории заказов
// Устанавливается "правильное" значение тега

if (isset($attributes[tags])) {

	$tags = trim($attributes[tags]);
	
	if ($tags != '') {
	
		$user_check = $user["id"];
	
		$exists = TRUE;
		
		while ($exists == TRUE) {
		
			$query = "SELECT tags
		                FROM arch_zakaz 
		               WHERE user_id=$user_check AND
					         tags='$tags'";
		    
		    $qry_check_tags = mysql_query($query) or die($query);
	    
			if (mysql_num_rows($qry_check_tags) > 0) {
			
				$tags .= '+';
			
			} else {
			
				$exists = FALSE;
			
			}
		}
		 
    }
	
	$attributes[tags] = $tags;
}
?>