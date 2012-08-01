<?php

/*
 * created by arcady.1254 1.11.2011
 */

function query_storefront($company_id){
    
    $query = "SELECT s.id, s.name, s.domen, s.where_res
                 FROM storefront AS s, storefront_data AS sd 
                 WHERE sd.storefront_id = s.id AND sd.company_id = $company_id 
                 GROUP BY s.id";
  
    $result = mysql_query($query) or die ($query);
    
   // echo $query;
    
    return $result;
    
}

?>
