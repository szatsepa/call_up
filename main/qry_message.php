<?php 

$role = $user["role"];

$query = "SELECT message FROM messages
          WHERE role = $role AND 
          status = 1
          ORDER BY time DESC
          LIMIT 1";

$qry_message = mysql_query($query) or die($query);

?>