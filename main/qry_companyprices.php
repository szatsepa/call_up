<?php 

if ($authentication == "yes") {
    $user_for_select = $attributes[user_id];
    
    // Список прайсов для поставщика
    if (!isset($attributes[company_id])) {
        $attributes[company_id] = $user["company_id"];
    }
    
} else {
    $user_for_select = 0;
}
$company_id = quote_smart($attributes[company_id]);

$query = "SELECT p.id,p.comment,k.price_id,k.user_id,p.status
FROM price p
LEFT OUTER JOIN kabinet k
ON p.id = k.price_id AND k.user_id = $user_for_select
WHERE p.company_id=$company_id AND p.creation IS NOT NULL
ORDER BY p.creation";

//$query = "SELECT id,comment FROM price WHERE company_id=$attributes[company_id] AND creation IS NOT NULL ORDER BY creation";

$qry_companyprices = mysql_query($query) or die($query);

$query = "SELECT * FROM `storefront` AS st, `storefront_data` AS std WHERE st.id = std.storefront_id AND std.company_id = $company_id GROUP BY st.id";

$result = mysql_query($query) or die($query);

$store_arr = array();

while ($var = mysql_fetch_assoc($result)){
    
    array_push($store_arr, $var);
    
}

mysql_free_result($result);
?>