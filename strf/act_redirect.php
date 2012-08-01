<?php

/*
 * created by arcady.1254@gmail.com 11.11.2011
 */
 
?>

<form action="index.php?act=statistics" method="post">
    <script language="javascript">
    document.write ('<input name="scr_W" type="hidden" value="'+ screen.width + '"><input name="scr_H" type="hidden" value="'+screen.height + '"><input name="colorDepth" type="hidden" value="'+screen.colorDepth+ '"><input name="cod" type="hidden" value="<?php echo $cod;?>"><input name="stid" type="hidden" value="14"></form>');
    document.forms[0].submit();
    </script>
