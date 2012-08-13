<?php

$user_id = $_SESSION[user]->data[id];

if($_SESSION[auth] == 1){
    
    $who = "user_id";
    
}  else {
    
    $who = "customer";
    
}

$goods_arr = array();

$query = "SELECT str_name,id,str_code1,num_amount,pricelist_id
FROM pricelist
WHERE (str_code1,pricelist_id)
IN
(SELECT b.artikul,b.price_id FROM 
 (SELECT a.artikul,a.price_id,COUNT(a.artikul) AS quantity 
  FROM arch_goods a WHERE a.$who = $user_id
  GROUP BY a.artikul   HAVING COUNT(a.artikul)>1
 ORDER BY quantity DESC) b
)";

$qry_userfavgoods = mysql_query($query) or die($query);

while ($row = mysql_fetch_assoc($qry_userfavgoods)){
    
    array_push($goods_arr, $row);
}

 ?>