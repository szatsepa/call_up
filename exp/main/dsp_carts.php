<br/><p class="order">Незавершенные заказы</p>
<?php if(count($cartlist_array)) { ?><?php }


// Выводим все корзины для текущего пользователя

$cart_count = 1;

foreach ($cartlist_array as $row) {
    
	$price_id = $row["price_id"];
        
//        echo "price_id -> $price_id<br>"; 
        
        include ("dsp_backtoprice.php");
	
//        include ("qry_cart_for_ofice.php");
        
        include 'qry_tickets.php';
        
	include ("dsp_cart.php");
        
	echo "<br />&nbsp;"; 
        
	++$cart_count;
}

 ?>