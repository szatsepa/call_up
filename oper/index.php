<?php

/*
 * rewrited by arcady.1254@gmail.com 16.9.2011
 */


// Просто комменты

$attributes = array();

$attributes = array_merge($_GET,$_POST,$_COOKIE); 

if(!isset($_SESSION)){ 

    session_start();  
}


$_SESSION[res] = "call-up.ru/oper/";

include 'main/classes.php';
include ("query/connect.php");
include ("func/quotesmart.php");

if(isset ($_SESSION[auth]) && $_SESSION[auth] > 0){
   include 'query/checkauth.php';
}

switch ($attributes[act]) { 
    
    case 'main':
        include 'main/header.php';
        include 'main/customerlist.php';
        include 'main/footer.php';
        break;
    
    
    case "authentication":
       
        include ("query/authentication.php");     
    break;
        
      case "logout":
        include ("action/logout.php");
    break;


default :

    header("location:index.php?act=main");
   
}

mysql_close();

if(isset ($attributes[err]) and $attributes[err] == 'auth'){
           echo '<script language="javascript">alert("Пожалуйста, введите правильно ключ\n                 или будьте гостем!.")</script>';
       }

?>
