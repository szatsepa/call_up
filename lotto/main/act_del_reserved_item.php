<?php

/*
 * created by arcady.1254@gmail.com 15.11.2011
 */
$ip = $_SERVER["REMOTE_ADDR"];

$ip = quote_smart($ip);

$artikul = quote_smart($attributes[artikul]);

$user_id = $_SESSION[user]->data[id];

if($_SESSION[auth] == 1){
    
    $who = "user_id";
    
}else if($_SESSION[auth] == 2){
    
    $who = "customer";
    
}

if(!isset ($_SESSION[user])){
    
    $query   = "UPDATE reserved_items 
				   SET num_amount   = (num_amount - 1),
				      time         = now(),
                                       ip = $ip
                                   WHERE artikul    = $artikul
                                   AND  cod         = $cod";
    
}else{
    
    $query   = "UPDATE reserved_items 
				   SET num_amount   = (num_amount - 1),
				       time         = now(),
                                       ip = $ip
                                   WHERE artikul    = $artikul
                                   AND  $who    = $user_id"; 
}

$result = mysql_query($query) or die($query);



if (mysql_affected_rows() == 0) {
    
    $query = "DELETE FROM reserved_items WHERE artikul = $artikul AND $who = $user_id";
    
    $result = mysql_query($query);
}

// если в корзине колич товаров равно нулю то удаляем сей артикул из корзины

	mysql_query("DELETE FROM reserved_items WHERE num_amount = 0");

$st_id = $attributes[stid];
    
?>
<form action="index.php?act=private_office" method="post">
    <script language="javascript">
    document.write ('<input type="hidden" name="stid" value="<?php echo $st_id;?>"/></form>');
    document.forms[0].submit();
    </script>