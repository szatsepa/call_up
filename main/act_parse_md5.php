<?php
$string = $attributes[cod];

$_SESSION[cod] = $string;

$attributes[user_id] = intval(substr($string, 0,6));

$attributes[company_id] = intval(substr($string, 6,6));

$attributes[price_id] = intval(substr($string, 12,6));

$user[id] = intval(substr($string, 0,6)); 

?>