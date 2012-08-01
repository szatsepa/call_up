<?php 

//??? $who???
$user_id = $_SESSION[user]->data[id];

if($_SESSION[auth] == 1){
    
    $who = "user_id";
    
}  else {
    
    $who = "customer";
    
}

$fav_array = array();

$query = "SELECT f.storefront_id,
                s.name,
                f.price_id,
                f.group, 
                p.company_id,
                p.comment 
            FROM favorites AS f,
                price AS p,
                storefront AS s
            WHERE $who = $user_id 
            AND p.id = f.price_id
            AND s.id = f.storefront_id";

$qry_faworites = mysql_query($query) or die($query);

while ($row = mysql_fetch_assoc($qry_faworites)){
    
    array_push($fav_array, $row);
}

?>