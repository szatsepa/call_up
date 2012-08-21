<?php

$res = $_SERVER[SERVER_NAME];

$st_id = $attributes[stid];

unset ($attributes);

unset($_SESSION[auth]);

unset($_SESSION[user]);

unset ($_SESSION[id]);

session_unset();

session_destroy();

// Удаляем куки для мобильной версии
if ($mobile == 'true') setcookie("di", 0, time()-1200);

header("location:index.php");
?>
