<?php 

if (isset($attributes[topic]) and $attributes[topic] != '') {

	$query = "DELETE FROM advert WHERE id LIKE 'matrix".$attributes[topic]."%'";
	$qry_matrixdel = mysql_query($query) or die($query);
	
	$query = "INSERT INTO advert (id) VALUES ('matrix".$attributes[topic]." ".$attributes[id]."')";
				
	$qry_matrixadd = mysql_query($query) or die($query);
	
	$error = "&error=ok";

}
?>