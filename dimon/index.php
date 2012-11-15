<?php
if(!isset($_SESSION)){  

    session_start();  
}

if(!isset($attributes) || !is_array($attributes)) {
    
	$attributes = array();
        
	$attributes = array_merge($_GET,$_POST,$_COOKIE); 
}


//echo "<br/>";
include ("query/connect.php"); 

include 'main/header.php';
print_r($_SESSION); 
switch ($attributes[act]){
    case 'main':
        
        include 'main/main_menu.php';
        
        break;
    
    case 'privat':
        
        include 'main/privat_ofice.php';
        break;
    
    case 'whot':
        
        break;
    
    case 'where':
        include 'main/header.php';
        break;
    
    default :
        
        
        include 'main/main.php';
        
        break;
}
include 'main/footer.php';
mysql_close();
?>
