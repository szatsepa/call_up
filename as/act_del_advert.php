<?php

/*
 * created by arcady.1254@gmail.com 14/1/2012
 */

$id = intval($attributes[id]);

$stid = intval($attributes[stid]);

$company_id = intval($attributes[company_id]); 

$name = $attributes[name];

$filename = $document_root.$name;

if(unlink($filename)){

        mysql_query("DELETE FROM storefront_reklama WHERE id = $id");

}

header("location:index.php?act=advert&stid=$stid&company_id=$company_id");
?>
