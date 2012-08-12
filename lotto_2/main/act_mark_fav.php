<?php

/*
 * created by arcady.1254@gmail.com 15.11.2011
 */

$st_id = $attributes[stid];

$user_id = $_SESSION[user]->data[id];

if($_SESSION[auth] == 1){
    
    $who = "user_id";
    
}else if ($_SESSION[auth] == 2){
    
   $who = 'customer'; 
}

    
$qry_ismark = mysql_query("SELECT * FROM favorites WHERE $who = $user_id AND storefront_id = $st_id");
   


$num_rows = mysql_num_rows($qry_ismark);

//echo "$num_rows<br/>";

if($num_rows == 0){

$query = "SELECT * FROM storefront_data WHERE storefront_id = $st_id";

$result = mysql_query($query) or die($query);

while ($row = mysql_fetch_assoc($result)){
        
        mysql_query("INSERT INTO favorites ($who, storefront_id, price_id) VALUES ($user_id, $st_id, $row[price_id])");
       
    }
}

?>
<form action="index.php?act=look" method="post">
    <script language="javascript">
    document.write ('<input type="hidden" name="stid" value="<?php echo $st_id;?>"/></form>');
    document.forms[0].submit();
    </script>