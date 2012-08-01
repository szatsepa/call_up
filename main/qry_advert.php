<?php 
// Выбор товара дня
$query = "SELECT id,
                 str_code1,
                 str_name,
                 pricelist_id 
          FROM pricelist 
          WHERE id IN (SELECT substr(id,6) as id 
                       FROM advert 
                       WHERE id LIKE 'tovar%')";
$qry_advert = mysql_query($query) or die($query);

// Выбор компании дня
$query = "SELECT id FROM advert WHERE id LIKE 'company%'";
$qry_companyadvert = mysql_query($query) or die($query);

?>