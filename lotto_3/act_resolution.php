<?php

/*
 * created by arcady.1254@gmail.com
 */
$st_id = $attributes[stid];

?>
<form action="index.php?act=create_order" method="post">
    <script language="javascript">
    document.write ('<input type="hidden" name="price_id" value="<?php echo $attributes[price_id];?>"/><input type="hidden" name="stid" value="<?php echo $st_id;?>"/><input name="scr_W" type="hidden" value="'+ screen.width + '"><input name="scr_H" type="hidden" value="'+screen.height + '"></form>');
    document.forms[0].submit();
    </script>
