<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include '../query/connect.php'; 

$uid = intval($_POST[uid]);

$query = "UPDATE customer SET `status` = 0 WHERE id = $uid";

mysql_query($query);

$del = mysql_affected_rows();

$query = "DELETE FROM cart WHERE customer = $uid";

mysql_query($query);

$out = array('uid'=>$uid,'del'=>$del);

echo json_encode($out);

mysql_close();
?>
