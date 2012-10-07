<?php 
// Получаем споисок всех корзин (прайсов с заказами) для текущего пользователя

$cartlist_array = array();

$user_id = $_SESSION[user]->data[id];

if($_SESSION[auth] == 1){
    
    $who = "user_id";
    
}  else {
    
    $who = "customer";
    
}
//
//$query = "SELECT DISTINCT price_id
//         FROM  cart 
//         WHERE $who=$user_id
//         ORDER BY price_id";  
 
 
$stid = intval($_SESSION[st]);

$query = "SELECT DISTINCT c.price_id
         FROM  cart  AS c, storefront_data AS std
         WHERE c.$who=$user_id AND c.price_id = std.price_id AND std.storefront_id = $stid
         ORDER BY c.price_id";


$qry_cartlist = mysql_query($query) or die($query);


while ($row = mysql_fetch_assoc($qry_cartlist)){
    
    array_push($cartlist_array, $row);
    
}
 

mysql_free_result($qry_cartlist);

?>