<?php

function postChange(){
     
     
      	
	$query = "SELECT num_amount,pricelist_id 
	          FROM   pricelist 
	          WHERE  str_code1    = $attributes[artikul] AND 
	                 pricelist_id = $attributes[price_id] AND 
					 str_code2 <> 'X'";
					 
	$qry_row = mysql_query($query) or die($query);
	$current_amount = mysql_result($qry_row,0,'num_amount');
	$pricelist_id = mysql_result($qry_row,0,'pricelist_id');
	
	if ($current_amount != 999999999 and !isset($demo)) {
		
		if(!isset($attributes[down])){
				  $query = "UPDATE pricelist 
							 SET num_amount = ($current_amount - $attributes[amount]) 
							  WHERE str_code1    = $attributes[artikul] AND 
									 pricelist_id = $_SESSION[price_id] AND 
									 str_code2 <> 'X'";

		}else{// ежели вернули из корзины товар то
					$query = "UPDATE pricelist 
							 SET num_amount = ($current_amount + $attributes[amount]) 
							  WHERE str_code1    = $attributes[artikul] AND 
									 pricelist_id = $_SESSION[price_id] AND 
									 str_code2 <> 'X'";
		}
	    $qry_row = mysql_query($query) or die($query);
	}

	

	// Обновим время укладки в корзину для всех товаров текущего пользователя
	// Это необходимо для корректной чистки корзины от "устаревших" товаров
	
	$query = "UPDATE cart SET time = now()  
			  WHERE user_id  = $id_user 
                            AND price_id = $_SESSION[price_id]";
	
	$qry_row = mysql_query($query) or die($query);
	
	
	// Пропишем в корзине id заказа, из которого создан данный заказ
	if (isset($parent_zakaz) and $parent_zakaz > 0) {
	
		$query = "UPDATE cart SET parent_zakaz = $parent_zakaz  
			  	   WHERE user_id  = $id_user AND 
			        price_id = $_SESSION[price_id]";
		
		$qry_parent_zakaz = mysql_query($query) or die($query);
	
	}
	

	// если в корзине колич товаров равно нулю то удаляем сей артикул из корзины

	mysql_query("DELETE FROM cart WHERE num_amount = 0");
        
              ?>
 <script language="javascript">javascript:alert('Товар в корзине заменен!');</script>     
<?php

}
?>
