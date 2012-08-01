<?php 

if (!isset($error)) {
	$error = '';
}

header ("location:index.php?act=advert".$error);

?>