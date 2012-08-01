<?php 

if (!isset($user["id"])) {
    $user_for_select = 0;
} else {
    $user_for_select = $user["id"];
}

$add_where = " AND a.user_id=".$user_for_select." ";

// Есть специальные параметры отображения?
if (isset($attributes[display])) {
	
	// Показываем все заказы только администратору
	if ($attributes[display] == 'all' and $user['role'] == 1) {
    	
		$add_where = '';
	}
	
	
} 


//$user_for_select = $user["id"];

$query = "SELECT DISTINCT a.id, 
                          DATE_FORMAT(a.time, '%d.%m.%y') zakaz_date,
						  a.status,
                          g.price_id,
                          p.comment price_name,
                          u.surname,
						  a.tags
          FROM arch_zakaz AS a, 
               arch_goods AS g,
               price AS p,
               users AS u
          WHERE u.id=a.user_id AND
                a.id=g.zakaz AND 
                p.id=g.price_id ".$add_where."
          ORDER BY id DESC";
 
$qry_archzakazlist = mysql_query($query) or die($query);

?>