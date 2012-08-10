<?php

/*
 * created by arcady.1254@gmail.com 1.11.2011
 */

$surname = quote_smart($attributes[surname]);
$name = quote_smart($attributes[name]);
$patronymic = quote_smart($attributes[patronymic]);
$e_mail = quote_smart($attributes[e_mail]);
$phone = quote_smart($attributes[phone]);
$shipping_address = quote_smart($attributes[shipping_address]);
$desire = quote_smart($attributes[desire]);
$customer_id = intval($attributes[id]);

$query = "UPDATE customer 
			SET surname    = $surname,
			    name       = $name,
    			patronymic = $patronymic,
    			e_mail      = $e_mail,
    			phone      = $phone,
			shipping_address = $shipping_address,
                        desire = $desire
			WHERE id = $customer_id";

$qru_customer_update = mysql_query($query) or die($query);
?>
