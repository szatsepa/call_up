<?php
// Выборка извлекает номера прайсов из корзины для конкретной компании


$query = "SELECT `company_id`
			FROM `price`
			WHERE `id` = $attributes[pricelist_id]";

$qry_company = mysql_query($query) or die($query);



 ?>