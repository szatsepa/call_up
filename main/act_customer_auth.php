<?php

if ($attributes[user_id] == 1) {
    
    $id = $attributes[user_id];
    
    $_SESSION['auth'] = 1;
     $_SESSION['customer'] = 1;
	$_SESSION['id']   = $id;
	
} else {
    header ("location:index.php?$attributes[query_str]&err=auth");
}

    ?>