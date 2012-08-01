<?php

/*
 * creted by arcady.1254@gmail.com
 */

$id = intval($attributes[id]);

$query = "DELETE FROM message_read WHERE message_id = $id";

$result = mysql_query($query) or die ($query);

$query = "DELETE FROM messages WHERE id = $id";

$result = mysql_query($query) or die($query);

mysql_free_result($result);

header("location:index.php?act=messages");

?>
