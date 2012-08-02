<?php
/*
 * To change this template, choose Tools |7/5/2012
 */
include '../query/connect.php';

$color = $_POST[colorDepth];

$ip=$_SERVER['REMOTE_ADDR'];

if(!isset ($_SESSION[id])){
    $id = 0;
}  else {
    $id = intval($_SESSION[id]);
}

   
$resolution = $_POST[scr_W]."x".$_POST[scr_H];


$agent = $_SERVER["HTTP_USER_AGENT"];

$query = "INSERT INTO statistics 
                        (ip,
                        resolution,
                        agent,
                        colorDepth)
                VALUES ('$ip',
                        '$resolution',
                        '$agent',
                        '$color')";

mysql_query($query);

$out = array('ok'=>mysql_insert_id());

$_SESSION[stat] = $out['ok'];

echo json_encode($out);

mysql_close();  
?>
