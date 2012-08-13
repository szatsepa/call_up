<br/>
<?php if(mysql_num_rows($qry_reservedlist)) { ?>
<p class="order">Отложеные товары</p>
<?php }
// Выводим все корзины для текущего пользователя

$cart_count = 1;

while ($row = mysql_fetch_assoc($qry_reservedlist)) {
    
	$price_id = $row["price_id"];
        
	include ("dsp_backtoprice_res.php");
        
	include ("qry_reserveds_for_ofice.php");
        
	include ("dsp_reserved.php");
        
	echo "<br />&nbsp;";
        
	++$cart_count;
}

 ?>