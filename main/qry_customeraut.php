<?php

$pwd = quote_smart($attributes[code]);

$query = "SELECT id 
FROM users
WHERE pwd=$pwd";
$qry_userauth = mysql_query($query) or die($query);

?>