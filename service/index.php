<?php

if(!isset($attributes) || !is_array($attributes)) {
	$attributes = array();
	$attributes = array_merge($_GET,$_POST,$_COOKIE); 
}

include ("../main/qry_connect.php");
include ("../main/act_quotesmart.php");


// Здесь устанавливаются алерты
//include ("act_checkerror.php");

switch ($attributes[act]) {
    
    	
	case "order":
    include ("order.php");
	break;
	
	}
	
    // Disconnect from db
    include ("../main/qry_disconnect.php");

?>