<?php

/*
 * created by arcady.1254@gmail.com 15.11.2011
 */
$user_id = $_SESSION[user]->data[id];

$price_id = $attributes[price_id];

if($_SESSION[auth] == 1){
    
    $query = "DELETE FROM reserved_items WHERE price_id = $price_id AND user_id = $user_id";
    
}else if($_SESSION[auth] == 2){
    
    $query = "DELETE FROM reserved_items WHERE price_id = $price_id AND customer = $user_id";
    
}

$result = mysql_query($query) or die($query);

$st_id = $attributes[stid];
?>
<form action="index.php?act=private_office" method="post">
    <script language="javascript">
    document.write ('<input type="hidden" name="stid" value="<?php echo $st_id;?>"/></form>');
    document.forms[0].submit();
    </script>
