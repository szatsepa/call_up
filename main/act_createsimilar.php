<?php 

// To do сделать сессионную защиту

$attributes[id] = intval($attributes[id]);

// Выясним, к какому прайсу имеет отношение заказ
$query = "SELECT DISTINCT price_id
          FROM arch_goods 
          WHERE zakaz = $attributes[id]";
$qry_priceid  = mysql_query($query) or die($query);
$pricelist_id = mysql_result($qry_priceid,0);
$attributes[pricelist_id] = $pricelist_id;

$query = "SELECT amount,
                 discount,
                 artikul 
           FROM arch_goods 
           WHERE zakaz = $attributes[id]";
$qry_archgoods = mysql_query($query) or die($query);

while ($row = mysql_fetch_assoc($qry_archgoods)) { 
    $attributes[amount] = $row["amount"];
    $attributes[discount] = $row["discount"];
    $attributes[artikul]  = $row["artikul"];
	$parent_zakaz = $attributes[id];
    
	// Не добавляем "удаленные" записи
	if ($attributes[amount] > 0) {
	
		include("main/act_add_cart.php");
	
	}
}

/* Уменьшаем кол-во товара в прайсе на содержимое корзины
$query = "UPDATE pricelist p
          RIGHT JOIN cart c ON p.pricelist_id=$pricelist_id
          AND p.str_code1=c.artikul 
          AND c.user_id=$user[id] 
          SET p.num_amount = p.num_amount-c.num_amount";

$qry_upd = mysql_query($query) or die($query);
*/

// Для заказов по дням недели не будем перенаправлять
if ($attributes[act] <> "weekorder") {

	header ("location:index.php?act=step1&pricelist_id=".$pricelist_id."&id=".$attributes[id].$urladd);

}
?>
