<?php 

// To do сделать сессионную защиту

$ip = $_SERVER["REMOTE_ADDR"];

$ip = quote_smart($ip);

$parent_order = intval($attributes[id]);

$user_id = $_SESSION[user]->data[id];

 if($_SESSION[auth] == 1){
        
        $who = "user_id";
        
    }else{
        
          $who = "customer";
    }

// Выясним, к какому прайсу имеет отношение заказ
$query = "SELECT DISTINCT price_id
          FROM arch_goods 
          WHERE zakaz = $attributes[id]";
$qry_priceid  = mysql_query($query) or die($query);

$pricelist_id = mysql_result($qry_priceid,0);

//$_SESSION[price_id] = $pricelist_id;

$query = "SELECT amount,
                 discount,
                 artikul 
           FROM arch_goods 
           WHERE zakaz = $attributes[id]";

$qry_archgoods = mysql_query($query) or die($query);

while ($row = mysql_fetch_assoc($qry_archgoods)) { 
           
        $amount = quote_smart($row[amount]);
        $discount = quote_smart($row[discount]);
        $artikul = quote_smart($row[artikul]);
       
	
	$add_message = '';
    
	// Не добавляем "удаленные" записи
	if ($amount > 0) {
	
		$query   = "UPDATE cart 
				   SET num_amount   = (num_amount + $amount),
				       num_discount = $discount,
				       time         = now(),
                                       ip = $ip,
                                       parent_zakaz = $parent_order
				 WHERE artikul    = $artikul
                                  AND  $who    = $user_id";
                
                $result = mysql_query($query) or die ($query);
                
                if (mysql_affected_rows() == 0) {
            
                
                $query = "INSERT INTO cart 
		          (num_amount,
		           num_discount,
		           $who,
		           artikul,
		           price_id,
		           time,
                           parent_zakaz,
                           ip) 
		          VALUES 
		          ($amount,
		           $discount,
		           $user_id,
		           $artikul,
		           (SELECT pricelist_id FROM pricelist WHERE str_code1 = $artikul),
		           now(),
                           $parent_order,
                           $ip)";
                
                $result = mysql_query($query) or die ($query);
                
            }
	
	}
        
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

 $query = "UPDATE cart SET time = now()  
			  WHERE $who  = $user_id AND 
			  price_id = (SELECT pricelist_id FROM pricelist 
                            WHERE str_code1 = $artikul)";
	
// если в корзине колич товаров равно нулю то удаляем сей артикул из корзины

	mysql_query("DELETE FROM cart WHERE num_amount = 0");


?>

<form action="index.php?act=private_office" method="post">
    <script language="javascript">
    document.write ('<input name="stid" type="hidden" value="<?php echo $attributes[stid];?>"></form>');
    document.forms[0].submit();
    </script>
