<?php

/*
 * created by arcady.1254@gmail.com
 */
include 'act_quotesmart.php';

setlocale(LC_ALL, 'ru_RU.utf8');

if ($_SERVER["SERVER_NAME"] == "localhost" or $_SERVER["SERVER_NAME"] == "192.168.1.7") {
	$environment = "dev";
	$link = mysql_connect("localhost","root","") or die ("Ошибка ");
	mysql_select_db("maraf_ru");
	mysql_query ("SET NAMES utf8");
    $document_root = $_SERVER["DOCUMENT_ROOT"]."/maraf";
	$host          = $_SERVER["HTTP_HOST"]."/maraf";
	} else {
	$environment = "pro";
	$link = mysql_connect("localhost:/tmp/mysqld.sock","maraf","iqmaraf1") or die ("Ошибка");
	mysql_select_db("maraf_ru");
    mysql_query ("SET NAMES utf8");
    $document_root = $_SERVER["DOCUMENT_ROOT"];
	$host          = $_SERVER["HTTP_HOST"];
	}
	
	if (mysql_errno() <> 0) exit("Ошибка");

        // Соберем статистику о пользователе
$color = quote_smart($_POST[colorDepth]);

$ip=$_SERVER['REMOTE_ADDR'];

$ip = quote_smart($ip);

   
$resolution = quote_smart($_POST[scr_W]."x".$_POST[scr_H]);


$agent = quote_smart($_SERVER["HTTP_USER_AGENT"]);


$query = "INSERT INTO statistics 
                        (ip,
                        resolution,
                        agent,
                        colorDepth)
                VALUES ($ip,
                        $resolution,
                        $agent,
                        $color)";

$act_stat = mysql_query($query) or die($query);

 mysql_close($link);
        
if($act_stat){  
?>
     <form action="/custom/index.php?act=customer" method="post">
     <input name="cod" type="hidden" value="<?php echo $string;?>"/> 
     <input name="stid" type="hidden" value="9"/>
     <script lenguich="javascript">
        document.write ('<input name="scr_W" type="hidden" value="'+ screen.width + '"/><input name="scr_H" type="hidden" value="'+screen.height + '"/><input name="colorDepth" type="hidden" value="'+screen.colorDepth+ '"/></form>');
        document.forms[0].submit();
    </script> 
<?php 
}
?>


