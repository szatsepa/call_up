<?php
// Выборка извлекает номера прайсов из корзины для конкретной компании

if (!isset($attributes[company_id])) {
    
	$attributes[company_id] = $user["company_id"];

	} else {

	$attributes[company_id] = intval($attributes[company_id]);

}

$query = "SELECT DISTINCT c.price_id
          FROM cart c,price p
          WHERE c.price_id   = p.id AND
                p.company_id = $attributes[company_id]";

$qry_companycart = mysql_query($query) or die($query);

 ?>