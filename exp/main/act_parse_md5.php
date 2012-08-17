<?php
if(isset ($attributes[cod])){
    
    $string = $attributes[cod];
    
}else{
    
    $string = $_SESSION['cod'];
    
}


if($_SESSION[authentication] != 1){

    $attributes[user_id] = intval(substr($string, 0,6));
    
    $user[id] = intval(substr($string, 0,6));

}

$attributes[company_id] = intval(substr($string, 6,6));

$attributes[pricelist_id] = intval(substr($string, 12,6));

$_SESSION[price_id] = $attributes[pricelist_id]; 

$_SESSION[company_id] = $attributes[company_id];


?>