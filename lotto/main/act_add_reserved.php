<?php
$ip = $_SERVER["REMOTE_ADDR"];

$ip = quote_smart($ip);

$price_id = intval($attributes[pricelist_id]);

 if(!isset ($_SESSION[auth]) or $_SESSION[auth] == 0){
        
        $id_user = 1;
        
    }else{
        
          $id_user = 0;
    }
  

	// Избавимся от "неправильных" значений
	if (!is_numeric($attributes[amount])) {
		$attributes[amount] = 1;
	}
			
	$attributes[amount] = intval($attributes[amount]);
	
	
	if ($attributes[amount] <= 0) {
		$attributes[amount] = 1;
	}
        
	
	$artikul = quote_smart($attributes[artikul]);
	$storefront_id = intval($attributes[stid]);
        
        if(isset ($attributes[discount])){
            $discount = quote_smart($attributes[discount]);
        }else{
            $discount = 0;
        }
        $amount = quote_smart($attributes[amount]);
        $cod = quote_smart($attributes[cod]);
        $user_id = $_SESSION[user]->data[id];
        $user_id = quote_smart($user_id);
	
	$add_message = '';
        
	
	if (isset($attributes[package])) {
	
		$attributes[package] = intval($attributes[package]);
		
	    $add_message = " Возможен заказ только полных упаковок.";
	    
	    // Сколько полных упаковок?
	    $packages = ceil ($attributes[amount] / $attributes[package]);
	    
	    // Новое количество товара с учетом полных упаковок
	    $amount = $packages * $attributes[package];
	}
	
	// Попытаемся обновить существующие записи в корзине
        
        if(!isset ($attributes[down]) && !isset ($_SESSION[user])){
            
            $query   = "UPDATE reserved_items 
				   SET num_amount   = (num_amount + $amount),
				       num_discount = $discount,
				       time         = now(),
                                       ip = $ip
				 WHERE artikul    = $artikul
                                  AND  cod   = $cod";
        }else if(isset ($attributes[down]) && !isset ($_SESSION[user])){
            
            $query   = "UPDATE reserved_items 
				   SET num_amount   = (num_amount - $amount),
				       num_discount = $discount,
				       time         = now(),
                                       ip = $ip
                                   WHERE artikul    = $artikul
                                   AND  cod         = $cod";
            
        }else if(!isset ($attributes[down]) && isset ($_SESSION[user]) && $_SESSION[auth] == 1){
            
            $query   = "UPDATE reserved_items 
				   SET num_amount   = (num_amount + $amount),
				       num_discount = $discount,
				       time         = now(),
                                       ip = $ip
				 WHERE artikul    = $artikul
                                  AND  user_id    = $user_id";
            
        }else if(isset ($attributes[down]) && isset ($_SESSION[user]) && $_SESSION[auth] == 1){
            
            $query   = "UPDATE reserved_items 
				   SET num_amount   = (num_amount - $amount),
				       num_discount = $discount,
				       time         = now(),
                                       ip = $ip
                                   WHERE artikul    = $artikul
                                   AND  user_id    = $user_id";            
            
        }else if(!isset ($attributes[down]) && isset ($_SESSION[user]) && $_SESSION[auth] == 2){
            
            $query   = "UPDATE reserved_items 
				   SET num_amount   = (num_amount + $amount),
				       num_discount = $discount,
				       time         = now(),
                                       ip = $ip
				 WHERE artikul    = $artikul
                                  AND  customer    = $user_id";
            
        }else if(isset ($attributes[down]) && isset ($_SESSION[user]) && $_SESSION[auth] == 2){
            
            $query   = "UPDATE reserved_items 
				   SET num_amount   = (num_amount - $amount),
				       num_discount = $discount,
				       time         = now(),
                                       ip = $ip
                                   WHERE artikul    = $artikul
                                   AND  customer    = $user_id";            
            
        }

					   
	$query_try = mysql_query($query) or die($query);


		
	
	// Таких записей нет, делаем простой INSERT
	if (mysql_affected_rows() == 0) {
            
            if(!isset ($_SESSION[user])){
                
                $query = "INSERT INTO reserved_items 
		          (num_amount,
		           num_discount,
		           user_id,
		           artikul,
		           price_id,
		           time,
                           cod,
                           ip) 
		          VALUES 
		          ($amount,
		           $discount,
		           $id_user,
		           $artikul,
		           $price_id,
		           now(),
                           $cod,
                           $ip)";
                
            }else if(isset ($_SESSION[user]) && $_SESSION[auth] == 2){
                
                $query = "INSERT INTO reserved_items 
		          (num_amount,
		           num_discount,
		           user_id,
		           artikul,
		           price_id,
		           time,
                           customer,
                           ip) 
		          VALUES 
		          ($amount,
		           $discount,
		           $id_user,
		           $artikul,
		           $price_id,
		           now(),
                           $user_id,
                           $ip)";
                
            }else if(isset ($_SESSION[user]) && $_SESSION[auth] == 1){
                
                $query = "INSERT INTO reserved_items 
		          (num_amount,
		           num_discount,
		           user_id,
		           artikul,
		           price_id,
		           time) 
		          VALUES 
		          ($amount,
		           $discount,
		           $user_id,
		           $artikul,
		           $price_id,
		           now())";
                
            }
                        
            
            
			           
		$qry_add = mysql_query($query) or die($query);
	}
        
        $affected = mysql_affected_rows();
     
      	
	$query = "SELECT num_amount,pricelist_id 
	          FROM   pricelist 
	          WHERE  str_code1    = $artikul 
        AND str_code2 <> 'X'";
					 
	$qry_row = mysql_query($query) or die($query);
	$current_amount = mysql_result($qry_row,0,'num_amount');
	$pricelist_id = mysql_result($qry_row,0,'pricelist_id');
	
	if ($current_amount != 999999999 and !isset($demo)) {
		
		if(!isset($attributes[down])){
				  $query = "UPDATE pricelist 
							 SET num_amount = ($current_amount - $amount) 
							  WHERE str_code1    = $artikul AND str_code2 <> 'X'";

		}else{
                    //// ежели вернули из корзины товар то
					$query = "UPDATE pricelist 
							 SET num_amount = ($current_amount + $amount) 
							  WHERE str_code1    = $artikul AND str_code2 <> 'X'";
		}
	    $qry_row = mysql_query($query) or die($query);
	}

	

	// Обновим время укладки в корзину для всех товаров текущего пользователя
	// Это необходимо для корректной чистки корзины от "устаревших" товаров
	if(!isset ($_SESSION[user])){
            
            $query = "UPDATE reserved_items SET time = now()  
			  WHERE cod  = $cod AND 
			  price_id = $price_id";
            
        }else if(isset ($_SESSION[user]) && $_SESSION[auth] == 1){
            
            $query = "UPDATE reserved_items SET time = now()  
			  WHERE user_id  = $user_id AND 
			  price_id = $price_id";
            
        }else if(isset ($_SESSION[user]) && $_SESSION[auth] == 2){
            
            $query = "UPDATE reserved_items SET time = now()  
			  WHERE customer = $user_id AND 
			  price_id = $price_id";
            
        }
	
	
	$qry_row = mysql_query($query) or die($query);
	
	
	// Пропишем в корзине id заказа, из которого создан данный заказ
        $parent_zakaz = quote_smart($attributes[parent_order]);
        
	if (isset($parent_zakaz) and $parent_zakaz > 0) {
            
            if(isset ($_SESSION[user]) && $_SESSION[auth] == 1){
            
            $query = "UPDATE reserved_items SET parent_zakaz = $parent_zakaz  
			  	   WHERE user_id  = $id_user AND 
			        price_id = $price_id";
            
        }else if(isset ($_SESSION[user]) && $_SESSION[auth] == 2){
            
            $query = "UPDATE reserved_items SET parent_zakaz = $parent_zakaz  
			  	   WHERE customer  = $id_user AND 
			        price_id = $price_id";
            
        }
	
		$qry_parent_zakaz = mysql_query($query) or die($query);
	
	}
	
// если в корзине колич товаров равно нулю то удаляем сей артикул из корзины

	mysql_query("DELETE FROM reserved_items WHERE num_amount = 0");
       
     if(isset($attributes[type]) && $attributes[type] == 1){
            ?>
<form action="index.php?act=look" method="post">
    <script language="javascript">
    document.write ('<input name="cod" type="hidden" value="<?php echo $attributes[cod];?>"><input name="stid" type="hidden" value="<?php echo $attributes[stid];?>"><input name="affected" type="hidden" value="<?php echo $affected;?>"></form>');
    document.forms[0].submit();
    </script>
<?php
}else if(isset($attributes[type]) && $attributes[type] == 2){
            ?>
 <form action="index.php?act=order" method="post">
    <script language="javascript">
    document.write ('<input name="cod" type="hidden" value="<?php echo $attributes[cod];?>"><input name="stid" type="hidden" value="<?php echo $attributes[stid];?>"><input name="affected" type="hidden" value="<?php echo $affected;?>"><input name="type" type="hidden" value="0"><input name="up" type="hidden" value="1"></form>');
    document.forms[0].submit();
    </script>   
    <?php
}else{
            ?>
     <form action="index.php?act=order" method="post">
    <script language="javascript">
    document.write ('<input name="cod" type="hidden" value="<?php echo $attributes[cod];?>"><input name="stid" type="hidden" value="<?php echo $attributes[stid];?>"><input name="affected" type="hidden" value="<?php echo $affected;?>"><input name="type" type="hidden" value="0"><input name="up" type="hidden" value="1"></form>');
    document.forms[0].submit();
    </script> 
    <?php
 }
       
?>
