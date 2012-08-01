<?php 

// Общий список компаний в системе

if($_SESSION[user][role] == 6){
    
    $company_id = intval($_SESSION[user][company_id]);
    
    $str = "AND id = $company_id ";
    
}
$query = "SELECT id,
				 name,
				 about,
				 full_about,
				 status,
				 inn,
				 contragent
			FROM companies 
			WHERE status > 0 $str 
			ORDER BY name";
$qry_companies = mysql_query($query) or die($query);

$bukva  = '';
$bukvar = array('А','Б','В','Г','Д','Е','Ж','З','И','К','Л','М','Н','О','П','Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Э','Ю','Я');
// to do безопасность!!!

if (isset($attributes[id]) and in_array($attributes[id],$bukvar)) {
	$bukva = "AND c.name LIKE '".$attributes[id]."%' ";
}

// Список компаний, у которых загружены прайс-листы
$query = "SELECT DISTINCT c.id,
						  c.name,
						  c.about,
						  c.status
					 FROM companies c, 
						  price p
					WHERE c.id = p.company_id AND 
						  c.status > 0
						  $bukva
						  AND p.creation IS NOT NULL 
				 ORDER BY c.name";
				
$qry_actualcompanies = mysql_query($query) or die($query);
?>