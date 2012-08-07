<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$id = intval($_SESSION[id]);

$query = "SELECT Max(id) FROM arch_zakaz";

$result = mysql_query($query) or die($query);

$var = mysql_fetch_row($result);

$order = $var[0] + 1;

$ticket = array('order'=>$order, 'schaz'=>date("j - m - Y"));

$query = "SELECT * FROM `tickets` WHERE `customer`= $id AND `id` = (SELECT Max(id) FROM tickets WHERE customer = $id)";

$result = mysql_query($query) or die($query);

$var = mysql_fetch_assoc($result);

$ticket['ticket'] = $var;
?>
