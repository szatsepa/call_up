<?php
/*
 * To change this template, choose Tools |7/5/2012
 */
include 'connect.php';

$color = $_POST[colorDepth];

$ip=$_SERVER['REMOTE_ADDR'];

$pwd = $_POST[pwd];

$query = "SELECT id FROM customer WHERE secret_key = '$pwd'"; 

$res = mysql_query($query);

$row = mysql_fetch_row($res);

$uid = $row[0];
   
$resolution = $_POST[scr_W]."x".$_POST[scr_H];

$agent = $_SERVER["HTTP_USER_AGENT"];

$query = "INSERT INTO statistics 
                        (ip,
                        resolution,
                        agent,
                        colorDepth,
                        customer)
                VALUES ('$ip',
                        '$resolution',
                        '$agent',
                        '$color',
                        $uid)";

mysql_query($query);

$out = array('ok'=>mysql_insert_id(),'query'=>"SELECT id FROM customer WHERE secret_key = $pwd");

echo json_encode($out);

mysql_close();  
?>
