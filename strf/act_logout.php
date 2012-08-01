<?php

$res = $_SESSION[resurs];

$st_id = $attributes[stid];

unset ($attributes);

unset($_SESSION[auth]);

unset($_SESSION[user]);

unset ($_SESSION[id]);

session_unset();

session_destroy();

// Удаляем куки для мобильной версии
if ($mobile == 'true') setcookie("di", 0, time()-1200);

?>
<form action="http://<?php echo $res;?>" method="post">
    <script language="javascript">
    document.write ('<input name="stid" type="hidden" value="<?php echo $st_id;?>"><input name="cod" type="hidden" value="<?php echo $attributes[cod];?>"></form>');
    document.forms[0].submit();
    </script>