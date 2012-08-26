<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$uid = $_SESSION[id];

$query = "SELECT * FROM tickets WHERE customer = $uid";

//echo $query."<br/>";

$result = mysql_query($query) or die($query);

$tickets_array = array();

while ($var = mysql_fetch_assoc($result)){
    array_push($tickets_array, $var);
}

mysql_free_result($result);


?>
