<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$query = "SELECT t.`id`,  t.`time`, c.`id` AS customer, c.`name`, c.`surname`, c.`email`, t.`field_A`,  t.`field_B`,  t.`field_C` FROM `tickets` AS t, `customers` AS c WHERE  t.`status`=0 AND  t.`customer` = c.`id`";

$result = mysql_query($query) or die($query);

$tickets = array();

while ($var = mysql_fetch_assoc($result)){
    array_push($tickets, $var);
}

mysql_free_result($result);
?>
