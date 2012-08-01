<?php

// Удаляем cookie
//setcookie("auth");
//setcookie("auth", $attributes[auth], time()-1200);

unset($_SESSION['auth']);
unset($_SESSION['id']);

session_destroy();

// Удаляем куки для мобильной версии
if ($mobile == 'true') setcookie("di", 0, time()-1200);

header ("location:index.php?out=1$urladd");

?>
