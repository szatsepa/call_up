<?php
// Выборка извлекает индексы компании из корзины для конкретного прайса

function price_name($id){

$query = "SELECT std.price_id, 
    p.comment , 
    std.company_id, 
    c.name 
    FROM storefront_data AS std, 
    price AS p, 
    companies AS c 
    WHERE std.storefront_id = $id 
    AND p.id = std.price_id 
    AND c.id = std.company_id
    AND p.status <> 2";

$qry_company = mysql_query($query) or die($query);

$prices_array = array();

while($row = mysql_fetch_assoc($qry_company)){

    array_push($prices_array, $row);        
        
}

return $prices_array;

}

 ?>