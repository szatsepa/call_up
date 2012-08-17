<?php

/*
 * created by arcady.1254@gmail.com 30/1/2012
 */

$resurs = quote_smart($_SERVER[SERVER_NAME]);

$query = "SELECT id FROM storefront WHERE where_res = $resurs";

$result = mysql_query($query) or die($query);

$row = mysql_fetch_assoc($result);

$stid = $row[id];

//$attributes[storefront] = $stid;
$attributes[storefront] = 1;

?>
