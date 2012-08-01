<?php
// Выборка данных по заказам для отчетов

$condition = '';

// Выборка по компаниям?
if (isset($attributes[default_company])){
	
	if ($attributes[default_company] > 0) {
	
		$condition .= 'p.company_id='.$attributes[default_company]." AND ";
	
	}
	
	// Это не администратор? Тогда выводим отчет по конкретному пользователю.
	if ($user["role"] <> 1) {
	
		$condition .= "zh.user_id=".$user["id"]." AND ";
	
	}
	
}


// Выборка по заказчикам?
if (isset($attributes[for_user_id])){
	
	if ($attributes[for_user_id] > 0) {
	
		$condition .= 'zh.user_id='.$attributes[for_user_id]." AND ";
	
	}
	
	// Это не администратор? Тогда выводим отчет по конкретной компании.
	if ($user["role"] <> 1) {
	
		$condition .= "p.company_id=".$user["company_id"]." AND ";
	
	}
	
}


$start_time = quote_smart($attributes[start_year]."-".$attributes[start_mon]."-".$attributes[start_day]." 00:00:00");
$end_time   = quote_smart($attributes[end_year]."-".$attributes[end_mon]."-".$attributes[end_day]." 23:59:59");

//echo $start_time." ".$end_time;

$query = "SELECT DISTINCT zh.id,
						  zh.time,
						  UNIX_TIMESTAMP(zh.time) AS time_timestamp,
						  zh.status,
						  SUM(ag.amount*ag.price_single) AS summa_zakaza,
						  zh.user_id,
						  ag.price_id,
						  u.surname,
						  p.company_id,
						  c.name
					 FROM zakaz_history zh, 
					 	  arch_goods ag,
						  users u,
						  price p,companies c
				    WHERE ag.zakaz=zh.id AND 
						  zh.user_id=u.id AND 
						  p.id=ag.price_id AND
						  c.id=p.company_id AND 
						  zh.time >= $start_time AND 
						  zh.time <= $end_time AND ".
						  $condition
						  ."zh.status=6
				 GROUP BY zh.id
				 ORDER BY zh.time,
				 		  p.company_id";

//echo $query;
						  
$qry_otchet = mysql_query($query) or die($query);

?>