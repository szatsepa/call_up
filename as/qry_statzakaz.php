<?php 

$query = "SELECT id,
                 DATE_FORMAT(time, '%d-%b-%y %H:%i') zakaz_date,
				 ip,
				 resolution,
				 agent
          FROM arch_zakaz  
		  WHERE agent IS NOT NULL
          ORDER BY id DESC";

$qry_statzakaz = mysql_query($query) or die($query);

?>