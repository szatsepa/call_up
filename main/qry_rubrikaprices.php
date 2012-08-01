<?php

// to do безопасность!!, также учитывать статус прайса!!! вдруг он удален?


if (isset($attributes[id]) and intval($attributes[id]) > 0 and intval($attributes[id] < 10)) {
    
	$rubrika = intval($attributes[id]);

	} else {
    
	$rubrika = 1;
	
}




$query = "SELECT p.id,
                 p.comment,
                 p.rubrika,
                 p.tags,
                 r.name,
                 c.id AS company_id,
                 c.name AS company_name 
          FROM price p, 
               rubrikator r,
               companies c
          WHERE p.rubrika=r.id AND 
                p.rubrika = $rubrika AND
                p.company_id = c.id 
          ORDER BY comment";


$qry_rubrikaprices = mysql_query($query) or die($query);

?>