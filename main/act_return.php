<?php

// Возвращемся в то же место, откуда "уходили".

if (isset($attributes[query_str])) {
	$query_str = $attributes[query_str];

} else {
	$query_str = '';
}

header ("location:index.php?$query_str");

 ?>