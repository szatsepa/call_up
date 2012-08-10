<?php

/*
 * created by arcady1254 6.11.2011
 */
$name = quote_smart($attributes[name]);

$company_id = intval($attributes[company_id]);

$query = "INSERT INTO storefront (name) VALUES ($name)";

$result = mysql_query($query) or die($query);

$id = mysql_insert_id();

$query = "INSERT INTO storefront_data (storefront_id, company_id) VALUES ($id, $company_id)";

$result = mysql_query($query) or die($query);

mysql_free_result($result);

header("location:index.php?act=strf");
        
?>
