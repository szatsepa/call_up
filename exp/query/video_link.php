<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connect.php';

$result = mysql_query("SELECT * FROM `draw` WHERE id = (SELECT MAX( id ) FROM `draw` )");

$var = mysql_fetch_assoc($result);

$out = array('dt'=>$var[date_draw],'vl'=>$var[video_link ]);

echo json_encode($out);

mysql_close();
?>
