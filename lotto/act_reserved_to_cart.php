<?php

/*
 * created by arcady.1254@gmail.com 15.11.2011
 */
$user_id = $_SESSION[user]->data[id];

$price_id = $attributes[price_id];

$ip = $_SERVER["REMOTE_ADDR"];

$ip = quote_smart($ip);

if(!isset ($_SESSION[auth]) or $_SESSION[auth] == 0){
        
        $id_user = 1;
        
    }else{
        
          $id_user = 0;
    }

$reserved_array = array();

if($_SESSION[auth] == 2){
    
    $query ="SELECT * FROM reserved_items WHERE price_id = $price_id AND customer = $user_id";
    
}else if($_SESSION[auth] == 1){
    
    $query ="SELECT * FROM reserved_items WHERE price_id = $price_id AND user_id = $user_id";
    
}

$result = mysql_query($query) or die($query);

while ($row = mysql_fetch_assoc($result)){
    
    array_push($reserved_array, $row);
    
}

foreach ($reserved_array as $value) {
    
    	// Избавимся от "неправильных" значений
	if (!is_numeric($value[num_amount])) {
		$value[num_amount] = 1;
	}
			
	$value[num_amount] = intval($value[num_amount]);
	
	
	if ($value[num_amount] <= 0) {
		$value[num_amount] = 1;
	}
        
	
	$artikul = quote_smart($value[artikul]);
        
	$storefront_id = intval($attributes[stid]);
        
        if(isset ($value[num_discount])){
            $discount = quote_smart($value[num_discount]);
        }else{
            $discount = 0;
        }
        
        $amount = quote_smart($value[num_amount]);
        
        $cod = quote_smart($value[cod]);
       
	
	$add_message = '';
        
	// Попытаемся обновить существующие записи в корзине
        
        if($_SESSION[auth] == 1){
            
            $query   = "UPDATE cart 
				   SET num_amount   = (num_amount + $amount),
				       num_discount = $discount,
				       time         = now(),
                                       ip = $ip
				 WHERE artikul    = $artikul
                                  AND  user_id    = $user_id";
            
        }  else {
            
            $query   = "UPDATE cart 
				   SET num_amount   = (num_amount + $amount),
				       num_discount = $discount,
				       time         = now(),
                                       ip = $ip
				 WHERE artikul    = $artikul
                                  AND  customer    = $user_id";
            
        }          
            
       $query_try = mysql_query($query) or die($query);

// Таких записей нет, делаем простой INSERT
	if (mysql_affected_rows() == 0) {
            
            if($_SESSION[auth] == 2){
                
                $query = "INSERT INTO cart 
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
		           (SELECT pricelist_id FROM pricelist WHERE str_code1 = $artikul),
		           now(),
                           $user_id,
                           $ip)";
                
            }else if($_SESSION[auth] == 1){
                
                $query = "INSERT INTO cart 
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
		           (SELECT pricelist_id FROM pricelist WHERE str_code1 = $artikul),
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
		
		
				  $query = "UPDATE pricelist 
							 SET num_amount = ($current_amount - $amount) 
							  WHERE str_code1    = $artikul AND str_code2 <> 'X'";

	    $qry_row = mysql_query($query) or die($query);
	}
}

	// Обновим время укладки в корзину для всех товаров текущего пользователя
	// Это необходимо для корректной чистки корзины от "устаревших" товаров
	if(isset ($_SESSION[user]) && $_SESSION[auth] == 1){
            
            $query = "UPDATE cart SET time = now()  
			  WHERE user_id  = $user_id AND 
			  price_id = (SELECT pricelist_id FROM pricelist 
                            WHERE str_code1 = $artikul)";
            
        }else if(isset ($_SESSION[user]) && $_SESSION[auth] == 2){
            
            $query = "UPDATE cart SET time = now()  
			  WHERE customer = $user_id AND 
			  price_id = (SELECT pricelist_id FROM pricelist 
                            WHERE str_code1 = $artikul)";
            
        }
	
	
	$qry_row = mysql_query($query) or die($query);
	
	// если в корзине колич товаров равно нулю то удаляем сей артикул из корзины

	mysql_query("DELETE FROM cart WHERE num_amount = 0");
        
        if($_SESSION[auth] == 1){
           
            mysql_query("DELETE FROM reserved_items WHERE price_id = $price_id AND user_id = $user_id");
            
        }else if($_SESSION[auth] == 2){
            
            mysql_query("DELETE FROM reserved_items WHERE price_id = $price_id AND customer = $user_id");
           
        }
$st_id = $attributes[stid];        
?>

<form action="index.php?act=private_office" method="post">
    <script language="javascript">
    document.write ('<input type="hidden" name="stid" value="<?php echo $st_id;?>"/></form>');
    document.forms[0].submit();
    </script>
