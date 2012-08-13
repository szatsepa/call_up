<?php

$user_id = $_SESSION[user][id];

$query = "DELETE FROM reserved_items WHERE customer = $user_id";

$act_del = mysql_query($query) or die($query);

?>
