<?php

/*
 * created by arcady.1254@gmail.com 9/1/2012
 */
$stid = intval($attributes[stid]);

$id = intval($attributes[id]);

$type = intval($attributes[type]);

$name = quote_smart($attributes[name]);

$position = intval($attributes[num_baner]);

$company_id = intval($attributes[company_id]);

$position += 1;

$where = quote_smart($attributes[where]);

$status = intval($attributes[status]);

if($attributes[make] == "insert"){ 
    
   $query = "INSERT INTO storefront_reklama (storefront_id,name,where_from, company_id,position, status, type) VALUES ($stid,$name,$where,$company_id, $position, $status, $type)";
      
}
if($attributes[make] == "change"){
    
    $query = "UPDATE storefront_reklama SET storefront_id = $stid, name = $name, where_from = $where, company_id=$company_id, status = $status, type=$type WHERE id = $id";
    
}

$result = mysql_query($query) or die($query);

header("location:index.php?act=advert&stid=$stid&company_id=$company_id");    
?>
