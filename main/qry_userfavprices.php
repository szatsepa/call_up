<?php 

//??? user_id???
if ($authentication == "yes") {
    $user_for_select = intval($attributes[user_id]);
} else {
    $user_for_select = 0;
}

$query = "SELECT p.id,p.comment,k.price_id,user_id
FROM price p
RIGHT JOIN kabinet k
ON p.id = k.price_id AND k.user_id = $user_for_select
WHERE  p.creation IS NOT NULL AND 
       p.status = 1
ORDER BY p.creation";

$qry_userfavprices = mysql_query($query) or die($query);

$query = "SELECT id,name FROM companies where id IN (SELECT distinct company_id
FROM price p
RIGHT JOIN kabinet k
ON p.id = k.price_id AND k.user_id = $user_for_select
WHERE  p.creation IS NOT NULL)
ORDER BY id";

$qry_userfavcompanies = mysql_query($query) or die($query);

?>