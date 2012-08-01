<?php

/*
 * created by arcady.1254@gmail.com 11.11.2011
 */

include 'qry_domen.php';

?>

<form action="index.php?act=look&AMP;re=1" method="post">
    <script language="javascript">
    document.write ('<input name="cod" type="hidden" value="<?php echo $cod;?>"><input name="stid" type="hidden" value="<?php echo $num;?>"></form>');
    document.forms[0].submit();
    </script>
