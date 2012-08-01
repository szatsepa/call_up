<?php 

if (isset($attributes[company_id]) and $attributes[company_id] > 0) {
	
	$attributes[company_id] = intval($attributes[company_id]);
	
	if (isset($attributes[comment])) {
		// Создаем новый прайс из кабинета Поставщика
		$attributes[comment] = quote_smart($attributes[comment]);
		
		$query = "INSERT INTO price (company_id,
									 comment,
									 creation,
									 status) 
						 VALUES     ($attributes[company_id],
						 			 $attributes[comment],
									 now(),
									 2)";
		$qry_priceadd = mysql_query($query) or die($query);
		
	} else {
		
		$query = "INSERT INTO price (company_id) VALUES ($attributes[company_id])";
		$qry_priceadd = mysql_query($query) or die($query);
		$price_id = mysql_insert_id();
		
		// Информация для редиректа
		$attributes[query_str] = "act=price&price_id=".$price_id;
	}
}
?>