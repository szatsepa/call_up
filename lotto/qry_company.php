<?php
// Выборка извлекает индексы компании из корзины для конкретного прайса

function company_id($pl_id){

$query = "SELECT company_id, comment FROM price WHERE id=$pl_id";

$qry_company = mysql_query($query) or die($query);

while($row = mysql_fetch_assoc($qry_company)){

	$price[company] = $row["company_id"];
        
}

return $price[company];

}

 ?>