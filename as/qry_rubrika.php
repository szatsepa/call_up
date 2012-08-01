<?php 

$attributes[id] = intval($attributes[id]);

$query = "SELECT id,name 
          FROM rubrikator 
		  WHERE id=$attributes[id]";
$qry_rubrika = mysql_query($query) or die($query);


?>