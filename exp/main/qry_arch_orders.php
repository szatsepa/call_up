<?php

if (isset($attributes[id])) {

	$id = intval($attributes[id]);

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
        c_number
              FROM arch_zakaz 
              WHERE id=$id";
    
    $qry_archzakaz = mysql_query($query) or die($query);
    
    $query = "SELECT name,
                     price_single,
                     amount,
                     discount 
              FROM arch_goods  
              WHERE zakaz = $id";
    
    $qry_archgoods = mysql_query($query) or die($query);
}
?>