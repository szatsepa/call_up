<?php

$pwd = quote_smart(md5($attributes['code']));

$query = "SELECT id 
            FROM users
            WHERE pwd=$pwd";
$qry_userauth = mysql_query($query) or die($query);

?>