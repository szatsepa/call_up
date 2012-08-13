<?php

$res = $_SERVER[SERVER_NAME];

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
<form action="http://<?php echo $_SERVER[SERVER_NAME];?>" method="post">
    <script language="javascript">
    document.write ('</form>');
    document.forms[0].submit();
    </script>