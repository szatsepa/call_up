<?php


$group = quote_smart($attributes[group]);

$query = "DELETE FROM `favorites` WHERE `group` = $group";

$act_del = mysql_query($query) or die($query);

header("location:index.php?act=private_office");

?>
