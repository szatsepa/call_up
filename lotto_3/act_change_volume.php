<?php

/*
 * created by arcady.1254@gmail.com 1/01/2012
 */

if($_SESSION[auth] == 1){
   
    $who = 'user_id';
    
}  else if($_SESSION[auth] == 2){
    
    $who = 'customer';
    
}else{
    
    $who = 'cod';
    
}

if(isset($_SESSION[user])){
    
   $user_id = $_SESSION[user] -> data[id];
        
    $user_id = quote_smart($user_id);  
    
}
if(!isset ($_SESSION[user]) OR $_SESSION[auth]!= 1 OR $_SESSION[auth]!= 2){
    
    $user_id = quote_smart($attributes[cod]);
    
} 

$art_n = quote_smart($attributes[art_n]);

$art_o = quote_smart($attributes[art_o]);

$where = $attributes[where];

if($where == 'to_order'){
    
  $query = "UPDATE `cart` SET `artikul` = $art_n WHERE $who = $user_id AND `artikul` = $art_o";
  
}  else if($where == 'to_reserved'){
    
   $query = "UPDATE `reserved_items` SET `artikul` = $art_n WHERE $who = $user_id AND `artikul` = $art_o";
   
}

$result = mysql_query($query) or die ($query);

?>

 <form action="index.php?act=order" method="post">
    <script language="javascript">
    document.write ('<input name="cod" type="hidden" value="<?php echo $attributes[cod];?>"><input name="stid" type="hidden" value="<?php echo $attributes[stid];?>"><input name="type" type="hidden" value="0"></form>');
    document.forms[0].submit();
    </script> 