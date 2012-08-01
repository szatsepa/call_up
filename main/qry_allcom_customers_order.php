<?php

/*
 * created by arcady.1254 1.11.2011
 */
if ($authentication == "yes") {
    $user_for_select = intval($attributes[user_id]);
    
    // Список прайсов для поставщика
    if (!isset($attributes[company_id])) {
        $attributes[company_id] = $user["company_id"];
    }
    
} else {
    $user_for_select = 0;
}



$query = "SELECT DISTINCT a.id, 
						  a.status,
                          DATE_FORMAT(a.time, '%d.%m.%y %H:%i') zakaz_date,
						  DATE_FORMAT(a.exe_time, '%d.%m.%y %H:%i') exe_date,
                          g.price_id,
                          p.comment price_name,
						  u.surname  
          FROM arch_zakaz AS a, 
               arch_goods AS g,
               price AS p,
               companies AS c,
			   customer AS u           
          WHERE a.id = g.zakaz AND 
                p.id = g.price_id AND 
                c.id = p.company_id AND
				u.id=a.customer AND
                a.id=g.zakaz AND 
                p.company_id = $attributes[company_id] AND 
                a.status > 0
          ORDER BY a.id DESC";
		  
$qry_customer_orders = mysql_query($query) or die($query);

?>
