<?php

/*
 * created by arcady.1254@gmail.com 15/1/2012
 */

$company_id = intval($attributes[company_id]);

$stid = intval($attributes[stid]);

$query = "SELECT name FROM storefront_reklama WHERE company_id = $company_id";

$result = mysql_query($query) or die($query);

while ($var = mysql_fetch_assoc($result)){
    
    $filename = $document_root.$var[name];
    
    unlink($filename);        
            
}

$query = "DELETE FROM storefront_reklama WHERE company_id = $company_id";

mysql_query($query) or die($query);

$query = "DELETE FROM advert_company WHERE id = $company_id";

mysql_query($query) or die($query);

header("location:index.php?act=advert&stid=$stid");

?>
