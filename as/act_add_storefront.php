<?php

/*
 * created by arcady1254 6.11.2011
 */
$name = quote_smart($attributes[name]);

$query = "INSERT INTO storefront (name) VALUES ($name)";

$result = mysql_query($query) or die($query);

header("location:index.php?act=strf");
        
?>
