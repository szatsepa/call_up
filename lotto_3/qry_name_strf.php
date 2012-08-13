<?php

/*
 * createdby arcady.1254@gmail.com 19.11.2011
 */
$query = "SELECT name FROM storefront WHERE id = $attributes[stid]";

$result = mysql_query($query) or die($query);

$row = mysql_fetch_assoc($result);

$strf_name = $row[name];

unset ($row);

mysql_free_result($result);

?>
