<?php

$ip = $_SERVER["REMOTE_ADDR"];

$ip = quote_smart($ip);

if($_SESSION[auth] == 1){
   
    $who = 'user_id';
    
}  else if($_SESSION[auth] == 2){
    
    $who = 'customer';
    
}

$user_id = $_SESSION[id];
        
$user_id = quote_smart($user_id);
        
        
if(!isset($attributes[cod])) $cod = NULL;

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
        
        $add_message = '';

        if (isset($attributes[package])) {
	
		$attributes[package] = intval($attributes[package]);
		
	    $add_message = " Возможен заказ только полных упаковок.";
	    
	    // Сколько полных упаковок?
	    $packages = ceil ($attributes[amount] / $attributes[package]);
	    
	    // Новое количество товара с учетом полных упаковок
	    $amount = $packages * $attributes[package];
	}

  
echo "USER ID = $user_id<br/>";
	// Попытаемся обновить существующие записи в корзине
        
        if(isset ($attributes[up]) && !isset ($_SESSION[user])){
            
            $query   = "UPDATE cart 
				   SET num_amount   = (num_amount + $amount),
				       num_discount = $discount,
				       time         = now(),
                                       ip = $ip
				 WHERE artikul    = $artikul
                                  AND  cod   = $cod";
        }else if(isset ($attributes[down]) && !isset ($_SESSION[user])){
            
            $query   = "UPDATE cart 
				   SET num_amount   = (num_amount - $amount),
				       num_discount = $discount,
				       time         = now(),
                                       ip = $ip
                                   WHERE artikul    = $artikul
                                   AND  cod         = $cod";
            
        }else if(isset ($attributes[up]) && isset ($_SESSION[user])){
            
            $query   = "UPDATE cart 
				   SET num_amount   = (num_amount + $amount),
				       num_discount = $discount,
				       time         = now(),
                                       ip = $ip
				 WHERE artikul    = $artikul
                                  AND  $who    = $user_id";
            
        }else if(isset ($attributes[down]) && isset ($_SESSION[user])){
            
            $query   = "UPDATE cart 
				   SET num_amount   = (num_amount - $amount),
				       num_discount = $discount,
				       time         = now(),
                                       ip = $ip
                                   WHERE artikul    = $artikul
                                   AND  $who    = $user_id";            
            
        }
					   
	$query_try = mysql_query($query) or die($query);


		
	
	// Таких записей нет, делаем простой INSERT
	if (mysql_affected_rows() == 0) {
            
            if(!isset ($_SESSION[user])){
                
                $query = "INSERT INTO cart 
		          (num_amount,
		           num_discount,
		           artikul,
		           price_id,
		           time,
                           cod,
                           ip) 
		          VALUES 
		          ($amount,
		           $discount,
		           $artikul,
		           (SELECT pricelist_id FROM pricelist WHERE str_code1 = $artikul),
		           now(),
                           $cod,
                           $ip)";
                
            }else{
                
                $query = "INSERT INTO cart 
		          (num_amount,
		           num_discount,
		           artikul,
		           price_id,
		           time,
                           $who,
                           ip) 
		          VALUES 
		          ($amount,
		           $discount,
		           $artikul,
		           (SELECT pricelist_id FROM pricelist WHERE str_code1 = $artikul),
		           now(),
                           $user_id,
                           $ip)";
                
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

		}else{// ежели вернули из корзины товар то
					$query = "UPDATE pricelist 
							 SET num_amount = ($current_amount + $amount) 
							  WHERE str_code1    = $artikul AND str_code2 <> 'X'";
		}
	    $qry_row = mysql_query($query) or die($query);
	}

	

	// Обновим время укладки в корзину для всех товаров текущего пользователя
	// Это необходимо для корректной чистки корзины от "устаревших" товаров
	if(!isset ($_SESSION[user])){
            
            $query = "UPDATE cart SET time = now()  
			  WHERE cod  = $cod AND 
			  price_id = (SELECT pricelist_id FROM pricelist 
                            WHERE str_code1 = $artikul)";
            
        }else {
            
            $query = "UPDATE cart SET time = now()  
			  WHERE $who  = $user_id AND 
			  price_id = (SELECT pricelist_id FROM pricelist 
                            WHERE str_code1 = $artikul)";
            
        }
        
	$qry_row = mysql_query($query) or die($query);
	
	
	// Пропишем в корзине id заказа, из которого создан данный заказ
        $parent_zakaz = quote_smart($attributes[parent_order]);
        
	if (isset($parent_zakaz) and $parent_zakaz > 0) {
            
            if(isset ($_SESSION[user])){
            
            $query = "UPDATE cart SET parent_zakaz = $parent_zakaz  
			  	   WHERE $who  = $id_user AND 
			        price_id = (SELECT pricelist_id FROM pricelist WHERE str_code1 = $artikul)";
            
        }
		$qry_parent_zakaz = mysql_query($query) or die($query);
	
	}
	
	// если в корзине колич товаров равно нулю то удаляем сей артикул из корзины

	mysql_query("DELETE FROM cart WHERE num_amount = 0");
       
        if(isset($attributes[type]) && $attributes[type] == 1){
            ?>
<form action="index.php?act=look" method="post">
    <script language="javascript">
    document.write ('<input name="cod" type="hidden" value="<?php echo $attributes[cod];?>"><input name="stid" type="hidden" value="<?php echo $attributes[stid];?>"><input name="affected" type="hidden" value="<?php echo $affected;?>"></form>');
    document.forms[0].submit();
    </script>
<?php
//            header ("location:index.php?act=look".$address."&affected=$attributes[affected]");
        }else if(isset($attributes[type]) && $attributes[type == 2]){
            ?>
 <form action="index.php?act=order" method="post">
    <script language="javascript">
    document.write ('<input name="cod" type="hidden" value="<?php echo $attributes[cod];?>"><input name="stid" type="hidden" value="<?php echo $attributes[stid];?>"><input name="affected" type="hidden" value="<?php echo $affected;?>"><input name="type" type="hidden" value="0"><input name="up" type="hidden" value="1"></form>');
    document.forms[0].submit();
    </script>   
    <?php
//            header ("location:index.php?act=order".$address."&affected=$attributes[affected]&type=0&up=1");
        }else{
            ?>
     <form action="index.php?act=order" method="post">
    <script language="javascript">
    document.write ('<input name="cod" type="hidden" value="<?php echo $attributes[cod];?>"><input name="stid" type="hidden" value="<?php echo $attributes[stid];?>"><input name="affected" type="hidden" value="<?php echo $affected;?>"><input name="type" type="hidden" value="0"><input name="up" type="hidden" value="1"></form>');
    document.forms[0].submit();
    </script> 
    <?php
//            header ("location:index.php?act=order".$address."&affected=$attributes[affected]&type=0&down=1");
        }
       
?>
