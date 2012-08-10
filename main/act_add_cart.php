<?php

if ($mobile == 'false') {

	// Избавимся от "неправильных" значений
	if (!is_numeric($attributes[amount])) {
		$attributes[amount] = 1;
	}
			
	$attributes[amount] = intval($attributes[amount]);
	
	
	if ($attributes[amount] <= 0) {
		$attributes[amount] = 1;
	}
	
	$attributes[artikul] 	  = quote_smart($attributes[artikul]);
	$attributes[pricelist_id] = intval($attributes[pricelist_id]);
	$attributes[discount] 	  = quote_smart($attributes[discount]);
	
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
				   SET num_amount   = (num_amount + $attributes[amount]),
				       num_discount = $attributes[discount],
				       time         = now() 
				 WHERE user_id    = $user[id] AND
				       artikul    = $attributes[artikul] AND
					   price_id   = $attributes[pricelist_id]";

	}else{

		$query   = "UPDATE cart 
				   SET num_amount   = (num_amount - $attributes[amount]),
				       num_discount = $attributes[discount],
				       time         = now() 
				 WHERE user_id    = $user[id] AND
				       artikul    = $attributes[artikul] AND
					   price_id   = $attributes[pricelist_id]";
	
	}
				   
	$query_try = mysql_query($query) or die($query);


		
	
	// Таких записей нет, делаем простой INSERT
	if (mysql_affected_rows() == 0) {
		$query = "INSERT INTO cart 
		          (num_amount,
		           num_discount,
		           user_id,
		           artikul,
		           price_id,
		           time) 
		          VALUES 
		          ($attributes[amount],
		           $attributes[discount],
		           $user[id],
		           $attributes[artikul],
		           $attributes[pricelist_id],
		           now())";
		           
		$qry_add = mysql_query($query) or die($query);
	}
	
	$query = "SELECT num_amount,pricelist_id 
	          FROM   pricelist 
	          WHERE  str_code1    = $attributes[artikul] AND 
	                 pricelist_id = $attributes[pricelist_id] AND 
					 str_code2 <> 'X'";
					 
	$qry_row = mysql_query($query) or die($query);
	$current_amount = mysql_result($qry_row,0,'num_amount');
	$pricelist_id = mysql_result($qry_row,0,'pricelist_id');
	
	if ($current_amount != 999999999 and !isset($demo)) {
		
		if(!isset($attributes[down])){
				  $query = "UPDATE pricelist 
							 SET num_amount = ($current_amount - $attributes[amount]) 
							  WHERE str_code1    = $attributes[artikul] AND 
									 pricelist_id = $attributes[pricelist_id] AND 
									 str_code2 <> 'X'";

		}else{// ежели вернули из корзины товар то
					$query = "UPDATE pricelist 
							 SET num_amount = ($current_amount + $attributes[amount]) 
							  WHERE str_code1    = $attributes[artikul] AND 
									 pricelist_id = $attributes[pricelist_id] AND 
									 str_code2 <> 'X'";
		}
	    $qry_row = mysql_query($query) or die($query);
	}

	

	// Обновим время укладки в корзину для всех товаров текущего пользователя
	// Это необходимо для корректной чистки корзины от "устаревших" товаров
	
	$query = "UPDATE cart SET time = now()  
			  WHERE user_id  = $user[id] AND 
			        price_id = $attributes[pricelist_id]";
	
	$qry_row = mysql_query($query) or die($query);
	
	
	// Пропишем в корзине id заказа, из которого создан данный заказ
	if (isset($parent_zakaz) and $parent_zakaz > 0) {
	
		$query = "UPDATE cart SET parent_zakaz = $parent_zakaz  
			  	   WHERE user_id  = $user[id] AND 
			        price_id = $attributes[pricelist_id]";
		
		$qry_parent_zakaz = mysql_query($query) or die($query);
	
	}
	
	// если в корзине колич товаров равно нулю то удаляем сей артикул из корзины

	mysql_query("DELETE FROM cart WHERE num_amount = 0");

	

	if(!isset($attributes[down])){
		$javascript = "javascript:alert('Товар в количестве $attributes[amount] шт. добавлен.$add_message');";
	}else{
		$javascript = "javascript:alert('Товар в количестве $attributes[amount] шт. удален.$add_message');";
	}

} else {
// Мобильная версия добавления в корзину
	
        $artikul  = array();
	$amount   = array();
	$discount = array();
	$package  = array();
	
	if(isset($attributes[goods]) and $attributes[goods] > 0) {
		$goods_recieved = $attributes[goods];
	} else {
		break;
	}
	
	$goods_added  = 0;
	
	for ($i=0;$i < $goods_recieved; ++$i){
	
		$cur_artikul  = "artikul".$i;
		$cur_amount   = "amount".$i;
		$cur_discount = "discount".$i;
		$cur_exist    = "exist".$i;
		$cur_package  = "package".$i;
		
		if ($attributes[$cur_amount] != '' and is_numeric($attributes[$cur_amount]) and $attributes[$cur_amount] >= 0) {
			// Есть предыдущий заказанный товар?
			if (isset($attributes[$cur_exist]) and is_numeric($attributes[$cur_exist]) and $attributes[$cur_exist] > 0) {
				$amount[$goods_added] = $attributes[$cur_amount] - $attributes[$cur_exist];
			} else {
				$amount[$goods_added] = $attributes[$cur_amount];
			}
			
			// Товар заказывается упаковками?
			if (isset($attributes[$cur_package]) and is_numeric($attributes[$cur_package]) and $attributes[$cur_package] > 0) {
				$package[$goods_added] = $attributes[$cur_package];
			}
			
			// To do берем значения без проверки!!!
			$artikul[$goods_added]  = $attributes[$cur_artikul];
			$discount[$goods_added] = $attributes[$cur_discount];		
			
			++$goods_added;
		}
	}
	
	$add_message = '';
	
	// Укладываем заказ в базу
	for ($j=0;$j < $goods_added; ++$j){
		
		// Есть "упаковки"?
		if (isset($package[$j]) and $package[$j] > 0) {	
		    $add_message = " Возможен заказ только полных упаковок.";
		    
		    // Сколько полных упаковок?
		    $packages = ceil ($amount[$j] / $package[$j]);
		    
		    // Новое количество товара с учетом полных упаковок
		    $amount[$j] = $packages * $package[$j];
		}
		
		// Попытаемся обновить существующие записи в корзине
		$query   = "UPDATE cart 
					   SET num_amount   = (num_amount + ".$amount[$j]."),
					       num_discount = '".$discount[$j]."',
					       time         = now() 
					 WHERE user_id    = $user[id] AND
					       artikul    = '".$artikul[$j]."' AND
						   price_id   = ".$attributes[pricelist_id];
		//echo $query;			   
		$query_try = mysql_query($query) or die($query);
		
		// Таких записей нет, делаем простой INSERT
		if (mysql_affected_rows() == 0) {
			$query = "INSERT INTO cart 
			          (num_amount,
			           num_discount,
			           user_id,
			           artikul,
			           price_id,
			           time) 
			          VALUES 
			          (".$amount[$j].",
			          '".$discount[$j]."',
			           $user[id],
			          '".$artikul[$j]."',
			           $attributes[pricelist_id],
			           now())";
			           
			$qry_add = mysql_query($query) or die($query);
		}
		
		$query = "SELECT num_amount,pricelist_id 
	          FROM   pricelist 
	          WHERE  str_code1    = '".$artikul[$j]."' AND 
	                 pricelist_id = $attributes[pricelist_id] AND 
					 str_code2 <> 'X'";
		$qry_row = mysql_query($query) or die($query);
		$current_amount = mysql_result($qry_row,0,'num_amount');
		$pricelist_id = mysql_result($qry_row,0,'pricelist_id');
		
		if ($current_amount != 999999999 and !isset($demo)) {
		    $query = "UPDATE pricelist 
		             SET num_amount = ($current_amount - ".$amount[$j].") 
		             WHERE str_code1    = '".$artikul[$j]."' AND 
		                   pricelist_id = $attributes[pricelist_id] AND 
					 	   str_code2 <> 'X'";
		    $qry_row = mysql_query($query) or die($query);
		}
	
		// Обновим время укладки в корзину для всех товаров текущего пользователя
		// Это необходимо для корректной чистки корзины от "устаревших" товаров
		
		$query = "UPDATE cart SET time = now()  
				  WHERE user_id  = $user[id] AND 
				        price_id = $attributes[pricelist_id]";
		$qry_row = mysql_query($query) or die($query);
	
	
	}
	
	// Подчищаем нулевые значения остатка в корзине
	$query2 = "DELETE FROM cart 
			  WHERE user_id  = $user[id] AND 
			        price_id = $attributes[pricelist_id] AND 
					num_amount = 0";
	$qry_del = mysql_query($query2) or die($query2);
}
?>