<?php

// to do безопасность!!, также учитывать статус прайса!!! вдруг он удален?


$name = $attributes[name];


$query = "SELECT p.id,
				 p.comment,
				 p.tags,
     		     c.id AS company_id,
                 c.name AS company_name 
          FROM price p, 
		  	   companies c
          WHERE tags RLIKE '[[:<:]]".$name."[[:>:]]' AND
		  		p.company_id = c.id ";


$qry_tagprices = mysql_query($query) or die($query);

?>