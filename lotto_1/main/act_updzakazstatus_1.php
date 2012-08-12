<?php 

if (isset($attributes[id]) and $attributes[id] > 0 and isset($attributes[status]) and $attributes[status] > 0) {
    
	$attributes[status] = intval($attributes[status]);
	
    $and = '';
    
    // Добавим причину отмены заказа
    if (isset($attributes[decline_comment])){
        $attributes[decline_comment] = quote_smart($attributes[decline_comment]);
        $and = ",decline_comment = ".$attributes[decline_comment]." ";
    }
    
    
	/*$query = "UPDATE arch_zakaz 
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
                            user_id)
		              VALUES 
		                    ($attributes[id],
                             now(),
                             $attributes[status],
                             $user[id])";
                             
     $qry_zakazhistory = mysql_query($query2) or die($query2);
}                             
?>