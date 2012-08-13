<?php 
// Получаем споисок всех корзин (прайсов с заказами) для текущего пользователя


$user_id = $_SESSION[user]->data[id];

if($_SESSION[auth] == 1){
    
    $who = "user_id";
    
}  else {
    
    $who = "customer";
    
}

$query = "SELECT DISTINCT price_id
         FROM  reserved_items  
         WHERE $who=$user_id
         ORDER BY price_id";

$qry_reservedlist = mysql_query($query) or die($query);

?>