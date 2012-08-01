<?php 
// Проверка мобильного агента

$mobile = 'false';

$user_agent = $_SERVER['HTTP_USER_AGENT'];

if (eregi('ipod',$user_agent)||eregi('iphone',$user_agent)) $mobile = 'true'; 
if (eregi('android',$user_agent)||eregi('opera mini',$user_agent)) $mobile = 'true';  
if (eregi('blackberry',$user_agent)) $mobile = 'true';  
if (preg_match('/(palm os|palm|hiptop|avantgo|plucker|xiino|blazer|elaine)/i',$user_agent)) $mobile = 'true'; 
if (preg_match('/(windows ce; ppc;|windows ce; smartphone;|windows ce; iemobile)/i',$user_agent)) $mobile = 'true'; 
if  (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|vodafone|o2|pocket|kindle|mobile|pda|psp|treo)/i',$user_agent)) $mobile = 'true'; 

if (isset($attributes[mob])) {
	$mobile = 'true';
}

//$mobile = 'true';
?>
