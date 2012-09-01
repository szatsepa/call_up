<?php

/*
 * created by arcady.1254@gmail.com
 */

if(!isset ($_SESSION[domen])){
 if(isset ($attributes[stid])){ 
     
     $st_id = $attributes[stid];
     
     }  else {
         
         $st_id = $num;
     } 


$query = "SELECT domen, where_res FROM storefront WHERE id = 2";

$result = mysql_query($query) or die($query);

$row = mysql_fetch_assoc($result);

$domen = $row[domen];

$resurs = $row[where_res];

$_SESSION[domen] = $domen;

$_SESSION[resurs] = $resurs;

unset ($domen);

mysql_free_result($result);

}



?>
