<?php

$ip = $_SERVER["REMOTE_ADDR"];

$ip = quote_smart($ip);

if(!isset($_SESSION[auth]) or $_SESSION[auth]==0){
  $address = "&cod=$attributes[cod]";  
}

if ($mobile == 'false') {

$id_user = $_SESSION[user]->data[id];
    
// Избавимся от "неправильных" значений
	if (!is_numeric($attributes[amount])) {
		$attributes[amount] = 1;
	}
			
	$attributes[amount] = intval($attributes[amount]);
	
	
	if ($attributes[amount] <= 0) {
		$attributes[amount] = 1;
	}
	
	$attributes[artikul] 	  = quote_smart($attributes[artikul]);
	$_SESSION[price_id] = intval($attributes[price_id]);
	$attributes[discount] 	  = quote_smart($attributes[discount]);
        $attributes[cod] = $_SESSION[cod];
        $attributes[cod] = quote_smart($attributes[cod]);
        $user_id = quote_smart($_SESSION[user][id]);
	
	$add_message = '';
	
	if (isset($attributes[package])) {
	
		$attributes[package] = intval($attributes[package]);
		
	    $add_message = " Возможен заказ только полных упаковок.";
	    
	    // Сколько полных упаковок?
	    $packages = ceil ($attributes[amount] / $attributes[package]);
	    
	    // Новое количество товара с учетом полных упаковок
	    $attributes[amount] = $packages * $attributes[package];
	}
	
	// Попытаемся обновить существующие записи в корзине

	if(!isset($attributes[down])){
	$query   = "UPDATE cart 
                       SET user_id = 0,
                           num_amount   = (num_amount + $attributes[amount]),
                           num_discount = $attributes[discount],
                           time         = now(),
                           ip = $ip
                     WHERE artikul    = $attributes[artikul] 
                        AND price_id   = $_SESSION[price_id]
                        AND customer = $user_id";

	}else{

        $query   = "UPDATE cart 
                       SET user_id = 0,
                           num_amount   = (num_amount - $attributes[amount]),
                           num_discount = $attributes[discount],
                           time         = now(),
                           ip = $ip
                       WHERE artikul    = $attributes[artikul] 
                        AND price_id   = $_SESSION[price_id]
                        AND customer = $user_id";
               
	
	}
				   
	$query_try = mysql_query($query) or die($query);


		
	
	// Таких записей нет, делаем простой INSERT
	if (mysql_affected_rows() == 0) {
            
            $query = "INSERT INTO cart 
		          (num_amount,
		           num_discount,
		           customer,
		           artikul,
		           price_id,
		           time,
                           ip) 
		          VALUES 
		          ($attributes[amount],
		           $attributes[discount],
		           $id_user,
		           $attributes[artikul],
		           $_SESSION[price_id],
		           now(),
                           $ip)";
            
			           
		$qry_add = mysql_query($query) or die($query);
	}
        
        $attributes[affected] = mysql_affected_rows();
     
      	
	$query = "SELECT num_amount,pricelist_id 
	          FROM   pricelist 
	          WHERE  str_code1    = $attributes[artikul] AND 
	                 pricelist_id = $_SESSION[price_id] AND 
					 str_code2 <> 'X'";
					 
	$qry_row = mysql_query($query) or die($query);
        
	$current_amount = mysql_result($qry_row,0,'num_amount');
        
	$pricelist_id = mysql_result($qry_row,0,'pricelist_id');
	
	if ($current_amount != 999999999 and !isset($demo)) {
		
		if(!isset($attributes[down])){
				  $query = "UPDATE pricelist 
                                             SET num_amount = ($current_amount - $attributes[amount]) 
                                          WHERE str_code1    = $attributes[artikul] 
                                            AND pricelist_id = $_SESSION[price_id] 
                                            AND str_code2 <> 'X'";

		}else{// ежели вернули из корзины товар то
                                $query = "UPDATE pricelist 
                                             SET num_amount = ($current_amount + $attributes[amount]) 
                                              WHERE str_code1    = $attributes[artikul] 
                                                AND pricelist_id = $_SESSION[price_id] 
                                                AND str_code2 <> 'X'";
		}
	    $qry_row = mysql_query($query) or die($query);
	}

	

	// Обновим время укладки в корзину для всех товаров текущего пользователя
	// Это необходимо для корректной чистки корзины от "устаревших" товаров
	
	$query = "UPDATE cart SET time = now()  
                  WHERE customer  = $id_user 
                    AND price_id = $_SESSION[price_id]";
	
	$qry_row = mysql_query($query) or die($query);
	
	
	// Пропишем в корзине id заказа, из которого создан данный заказ
	if (isset($parent_zakaz) and $parent_zakaz > 0) {
	
        $query = "UPDATE cart SET parent_zakaz = $parent_zakaz  
                   WHERE customer  = $id_user 
                    AND price_id = $_SESSION[price_id]";
		
		$qry_parent_zakaz = mysql_query($query) or die($query);
	
	}
	

	// если в корзине колич товаров равно нулю то удаляем сей артикул из корзины

	mysql_query("DELETE FROM cart WHERE num_amount = 0");
//        ".$address."
        if(!isset($attributes[down]) and !isset($attributes[up]) and $attributes[affected]){
            header ("location:index.php?act=customer&affected=$attributes[affected]");
        }else if(isset($attributes[up])){
            header ("location:index.php?act=step1&affected=$attributes[affected]&type=0&up=1");
        }else if(isset($attributes[down])){
            header ("location:index.php?act=step1&affected=$attributes[affected]&type=0&down=1");
        }
       
 }
?>