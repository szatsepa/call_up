<?php 

if (isset($attributes[id]) and $attributes[id] > 0 and isset($attributes[status]) and $attributes[status] > 0) {
    
	$attributes[status] = intval($attributes[status]);
        
        $attributes[id] = intval($attributes[id]);
	
    $and = '';
    
    // Добавим причину отмены заказа
    if (isset($attributes[decline_comment])){
        $attributes[decline_comment] = quote_smart($attributes[decline_comment]);
        $and = ",decline_comment = ".$attributes[decline_comment]." ";
    }
    if($_SESSION[auth] == 1){
        
        $who = 'user_id';
        
    }else if($_SESSION[auth] == 2){
        
        $who = 'customer';
        
    }
   /* $user_id = $_SESSION[user]->data[id];
	$query = "UPDATE arch_zakaz 
              SET status  = $attributes[status],
                  time    = now(),
                  user_id = $user[id]".$and." 
              WHERE id = $attributes[id]";	
	*/
	
	$query = "UPDATE arch_zakaz 
              SET status  = $attributes[status]"
                  .$and." 
              WHERE id = $attributes[id]";	
	
	$qry_updzakazstatus = mysql_query($query) or die($query);
    
    $query2 = "INSERT INTO zakaz_history 
		                   (id,
                            time,
                            status,
                            $who)
		              VALUES 
		                    ($attributes[id],
                             now(),
                             $attributes[status],
                             $user_id)";
                             
     $qry_zakazhistory = mysql_query($query2) or die($query2);
}                             
?>
<form action="index.php?act=private_office" method="post">
    <script language="javascript">
    document.write ('<input name="cod" type="hidden" value="<?php echo $attributes[cod];?>"><input name="stid" type="hidden" value="<?php echo $attributes[stid];?>"></form>');
    document.forms[0].submit();
    </script>