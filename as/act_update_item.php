<?php

/*
 * created by arcady.1254@gmail.com
 */

$barcode = quote_smart($attributes[id]);
$name = quote_smart($attributes[name]);
$short_description = quote_smart($attributes[short_description]);
$ingridients = quote_smart($attributes[ingridients]);
$specification = quote_smart($attributes[specification]);
$gost = quote_smart($attributes[gost]);
$nds = quote_smart($attributes[nds]);

$query = "UPDATE `goods` SET `name` = $name, 
                             `short_description` = $short_description,
                             `ingridients` = $ingridients, 
                             `specification`= $specification, 
                             `gost` = $gost,
                             `nds` = $nds
                       WHERE `barcode` = $barcode";

$result = mysql_query($query) or die ($query);

?>
<form action="index.php?act=goods" method="post">
    <script language="javascript">
    document.write ('<input name="page" type="hidden" value="<?php echo $attributes[page];?>"><input name="chota" type="hidden" value="<?php echo $attributes[barcode];?>"></form>');
    document.forms[0].submit();
    </script>
