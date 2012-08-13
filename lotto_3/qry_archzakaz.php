<?php

if (isset($attributes[id])) {

	$attributes[id] = intval($attributes[id]);
        
        if(!isset ($attributes[store])){
            
       

    $query = "SELECT DATE_FORMAT(time, '%d.%m.%Y, %H:%i') zakaz_date,
					 DATE_FORMAT(exe_time, '%d.%m.%y %H:%i') exe_date,
                     contragent_id,
                     contragent_name,
                     email,
                     shipment,
                     comments,
                     status,
                     decline_comment,
					 tags,
        user_id,
        customer
              FROM arch_zakaz 
              WHERE id=$attributes[id]";
     }  else {
          $query = "SELECT DATE_FORMAT(a.time, '%d.%m.%Y, %H:%i') zakaz_date,
					 DATE_FORMAT(a.exe_time, '%d.%m.%y %H:%i') exe_date,
                    a.contragent_id,
                     a.contragent_name,
                     a.email,
                     a.shipment,
                     a.comments,
                     a.status,
                     a.decline_comment,
					 a.tags,
        a.user_id,
        a.customer,
         c.surname,
         c.name
              FROM arch_zakaz AS a, customer AS c
              WHERE a.id=$attributes[id]
         AND a.customer = c.id";
     }
    
    $qry_archzakaz = mysql_query($query) or die($query);
    
    $query = "SELECT name,
                     price_single,
                     amount,
                     discount 
              FROM arch_goods  
              WHERE zakaz = $attributes[id]";
    
    $qry_archgoods = mysql_query($query) or die($query);
}
?>