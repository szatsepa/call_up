<?php

/*
 * created by arcady.1254@gmail.com 15.11.2011
 */
$ip = $_SERVER["REMOTE_ADDR"];

$ip = quote_smart($ip);

$artikul = quote_smart($attributes[artikul]);

if(isset ($attributes[cod]))$cod = quote_smart ($attributes[cod]);

$user_id = $_SESSION[user]->data[id];

if($_SESSION[auth] == 1){
    
    $who = "user_id";

    
}else if($_SESSION[auth] == 2){
    
    $who = "customer";
    
}  else if(!isset ($_SESSION[auth]) or $_SESSION[auth] == 0){
    
    $who = "cod";
    
    $user_id = $cod;
    
}
if(!isset ($attributes[type])){
    

if(!isset ($_SESSION[user])){
    
    $query   = "UPDATE cart 
				   SET num_amount   = (num_amount - 1),
				      time         = now(),
                                       ip = $ip
                                   WHERE artikul    = $artikul
                                   AND  cod         = $cod";
    
}else{
    
    $query   = "UPDATE cart 
				   SET num_amount   = (num_amount - 1),
				       time         = now(),
                                       ip = $ip
                                   WHERE artikul    = $artikul
                                   AND  $who    = $user_id"; 
}

}  else {
    
        if($attributes[type] == 'order'){
        
                 $query = "DELETE FROM cart WHERE artikul = $artikul AND $who = $user_id";
        
             }  else if($attributes[type] == 'reserved'){
        
                 $query = "DELETE FROM reserved_items WHERE artikul = $artikul AND $who = $user_id";
        
             }
  }
    
$result = mysql_query($query) or die($query);



if (mysql_affected_rows() == 0) {
    
    $query = "DELETE FROM cart WHERE artikul = $artikul AND $who = $user_id";
    
    $result = mysql_query($query);
}

// если в корзине колич товаров равно нулю то удаляем сей артикул из корзины

	mysql_query("DELETE FROM cart WHERE num_amount = 0");

$st_id = $attributes[stid];
if(isset ($_SESSION[auth]) and $_SESSION[auth]){    
?>
<form action="index.php?act=private_office" method="post">
    <script language="javascript">
    document.write ('<input type="hidden" name="stid" value="<?php echo $st_id;?>"/></form>');
    document.forms[0].submit();
    </script>
    <?php }  else {
        
        ?>
 <form action="index.php?act=look" method="post">
    <script language="javascript">
    document.write ('<input type="hidden" name="stid" value="<?php echo $st_id;?>"/><input type="hidden" name="cod" value="<?php echo $attributes[cod];?>"/></form>');
    document.forms[0].submit();
    </script>   
    <?php
    
} ?>
