<?php
if(!isset($_SESSION)){  

    session_start();  
}

if(!isset($attributes) || !is_array($attributes)) {
    
	$attributes = array();
        
	$attributes = array_merge($_GET,$_POST,$_COOKIE); 
}

//print_r($_SESSION);
//echo "<br/>";
include ("query/connect.php"); 
 
switch ($attributes[act]){
    case 'main':
        include 'main/header.php';
        include 'main/main_menu.php';
        break;
    
    
    
    default :
        
        include 'main/header.php';
        include 'main/main.php';
        
        break;
}

mysql_close();
?>
