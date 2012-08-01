<?php if(mysql_num_rows($qry_cartlist)) { ?>
<h3>Незавершенные заказы</h3>
<?php }
// Выводим все корзины для текущего пользователя

$cart_count = 1;

while ($row = mysql_fetch_assoc($qry_cartlist)) {
	$price_id = $row["price_id"];
	include ("main/dsp_backtoprice.php");
	
	$attributes[pricelist_id] = $price_id;
        include ("main/qry_cart.php");
	include ("main/dsp_cart.php");
	echo "<br />&nbsp;";
	++$cart_count;
}

 ?>