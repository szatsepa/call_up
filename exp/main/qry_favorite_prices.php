<?php 

//??? $who???
$user_id = $_SESSION[id];

$fav_array = array();

$query = "SELECT f.price_id AS pid, 
                f.group, 
                p.comment 
            FROM favorites AS f,
                price AS p
            WHERE customer = $user_id 
            AND p.id = f.price_id";

$result = mysql_query($query) or die($query); 


while ($row = mysql_fetch_assoc($result)){
    
    array_push($fav_array, $row);
}
mysql_free_result($result);
?>