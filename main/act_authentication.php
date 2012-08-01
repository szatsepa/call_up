<?php

$num_rows = mysql_num_rows($qry_userauth);

$query_str = str_replace ('out=1','',$attributes[query_str]);

if ($num_rows == 1) {
    $id = mysql_result($qry_userauth,0);
    
    $_SESSION['auth'] = 1;
	$_SESSION['id']   = $id;
	
	header ("location:index.php?$query_str");
	
	// В мобильной версии установим куку (неделя) для аутентификации
	if ($mobile == 'true') setcookie("di", $id, time()+680400);

} else {
    header ("location:index.php?$attributes[query_str]&err=auth");
}

    ?>