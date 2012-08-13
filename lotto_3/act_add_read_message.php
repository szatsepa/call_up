<?php

/*
 * created by arcady.1254@gmail.com
 */
if($_SESSION[auth] == 1){
    
    $who = "user_id";
    
}else if($_SESSION[auth] == 2){
    
    $who = "customer";
    
}

$user_id = $_SESSION[user] -> data[id];

$message_id = intval($attributes[mes]);

$query = "INSERT INTO `message_read` (`message_id`,`$who`) VALUES ($message_id, $user_id)";

$result = mysql_query($query)or die($query);
 
?>
