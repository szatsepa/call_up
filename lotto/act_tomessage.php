<?php

/*
 * created by arcady.1254@gmail.com 6/1/2012
 */
$message_id = intval($attributes[mes]);

$query = "SELECT `resurs` FROM `messages` WHERE `id` = $message_id";

$result = mysql_query($query) or die($query);

$row = mysql_fetch_row($result);

$resurs = $row[0];

header("location:http://$resurs");

?>
<!--<form action="http://<?php echo $resurs; ?>" method="post" target="_blank">
    <script language="javascript">
    document.write ('<input name="stid" type="hidden" value="<?php echo $attributes[stid];?>"/><input type="hidden" name="id" value="<?php echo $_SESSION[id];?>"/></form>');
    document.forms[0].submit();
    </script>-->
    