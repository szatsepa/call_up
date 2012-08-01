<?php 
// Получаем споисок всех корзин (прайсов с заказами) для текущего пользователя

if (!isset($user["id"])) {
    $current_user = 0;
} else {
    $current_user = $user["id"];
}

$query = "SELECT DISTINCT price_id
         FROM  cart 
         WHERE user_id=$current_user
         ORDER BY price_id";

$qry_cartlist = mysql_query($query) or die($query);

?>