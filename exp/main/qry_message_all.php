<?php

/*
 * created by arcy.1254@gmail.com 6/1/2012
 */

if($_SESSION[auth] == 1){
    
    $who = "user_id";
    
}else if($_SESSION[auth] == 2){
    
    $who = "customer";
    
}

$user_id = intval($_SESSION[user] -> data[id]);

$query = "SELECT `id`, `message`, `resurs` FROM `messages` WHERE `role` = 5 AND `status` = 1";

$result = mysql_query($query) or die($query);

$mes_arr = array();

while ($var = mysql_fetch_assoc($result)){
    
    array_push($mes_arr, $var);
    
}

$mes_c_arr = array();

$query = "SELECT `message_id` FROM `message_read` WHERE $who = $user_id";

$result = mysql_query($query) or die($query);

while ($var = mysql_fetch_assoc($result)){
    
    array_push($mes_c_arr, $var);
    
}

mysql_free_result($result); 

$messages_arr = array();

foreach ($mes_c_arr as $value) {
    
    foreach ($mes_arr as $key => $val) {        
       
        if($val[id] == $value[message_id]) unset ($mes_arr[$key]);
        
    }
    
}

foreach ($mes_arr as $var) {
    
    array_push($messages_arr, $var);
    
}

unset ($mes_c_arr);

unset ($mes_arr);

?>
