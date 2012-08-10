<?php

/*
 * created by arcady.1254@gmail.com 25/1/2012
 */

$stid = intval($attributes[stid]);

$query = "SELECT * FROM storefront_info WHERE storefront_id = $stid";

$result = mysql_query($query) or die($query);

$info = mysql_fetch_assoc($result);

mysql_free_result($result);

?>
