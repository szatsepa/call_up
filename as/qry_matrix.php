<?php

$query = "SELECT SUBSTR(id,7) AS id 
          FROM advert 
          WHERE id LIKE 'matrix%' 
          ORDER BY id";

$qry_matrix = mysql_query($query) or die($query);

?>