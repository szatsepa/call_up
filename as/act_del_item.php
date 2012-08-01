<?php

/*
 * created by arcady.1254@gmail.com 2/1/2012
 */

$barcode = quote_smart($attributes[barcode]);

$query = "SELECT `id` FROM `goods_pic` WHERE `barcode` = $barcode";

$result = mysql_query($query) or die ($query);

while ($row = mysql_fetch_assoc($result)){
    
    $filename = $document_root.'images/goods'.$row[id].'.jpg';
    
    unlink ($filename);
}

$query = "DELETE FROM `pricelist` WHERE `str_barcode`=$barcode";

mysql_query($query) or die($query);

$query = "DELETE FROM `goods_pic` WHERE `barcode` = $barcode";

mysql_query($query) or die($query);

$query = "DELETE FROM `goods` WHERE `barcode` = $barcode";

mysql_query($query) or die($query);

?>

 <form action="index.php?act=goods" method="post">
    <script language="javascript">
    document.write ('<input name="cod" type="hidden" value="aaaa"/></form>');
    document.forms[0].submit();
    </script> 