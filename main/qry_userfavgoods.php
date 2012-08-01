<?php

if (!isset($user["id"])) {
    $user_for_select = 0;
} else {
    $user_for_select = $user["id"];
}

//$user_for_select = $user["id"];

$query = "SELECT str_name,id,str_code1,num_amount,pricelist_id
FROM pricelist
WHERE (str_code1,pricelist_id)
IN
(SELECT b.artikul,b.price_id FROM 
 (SELECT a.artikul,a.price_id,a.user_id,COUNT(a.artikul) AS quantity 
  FROM arch_goods a
  GROUP BY a.artikul 
  HAVING a.user_id=$user_for_select AND COUNT(a.artikul)>1 
  ORDER BY quantity DESC) b
)";

$qry_userfavgoods = mysql_query($query) or die($query);

 ?>