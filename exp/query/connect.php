<?php 
// Определяем подключение к БД и корень документов

setlocale(LC_ALL, 'ru_RU.utf8');

if ($_SERVER["SERVER_NAME"] == "localhost" or $_SERVER["SERVER_NAME"] == "192.168.1.7") {
            $environment = "dev";
            $link = mysql_connect("localhost","root","") or die ("Ошибка ");
            mysql_select_db("call_up_ru");
            mysql_query ("SET NAMES utf8");
            $document_root = $_SERVER["DOCUMENT_ROOT"]."/call";
            $host          = $_SERVER["HTTP_HOST"]."/call";
	} else {
            $environment = "pro";
            $link = mysql_connect("localhost:/tmp/mysqld.sock","call_up", "call2010") or die ("Ошибка");
            mysql_select_db("call_up_ru");
            mysql_query ("SET NAMES utf8");
            $document_root = $_SERVER["DOCUMENT_ROOT"];
            $host          = $_SERVER["HTTP_HOST"];
	}
	
if (mysql_errno() <> 0) exit("Ошибка");
?>