<?php 

if (!isset($error)) {
	$error = '';
}

header ("location:index.php?act=img_menu".$error);

// to do сделать этот модуль функцией/процедурой и сделать рефакторинг!!!
?>