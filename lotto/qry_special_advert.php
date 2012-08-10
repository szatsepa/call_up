<?php

/*
 * created by arcady.1254@gmail.com 20/1/2012
 */
$stid = intval($attributes[stid]);

$query = "SELECT * FROM `storefront_reklama` WHERE `position` = 1 OR `position` = 2 OR `position` = 5 AND `storefront_id` = $stid";

$result = mysql_query($query) or die ($query);

$adverticement_array = array();

while ($var = mysql_fetch_assoc($result)){
    
    array_push($adverticement_array, $var);
    
}

mysql_free_result($result);

?>
