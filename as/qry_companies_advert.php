<?php

/*
 * created by arcady.1254@gmail.com 14/1/2012
 */

$company_id = intval($attributes[company_id]);

$query = "SELECT * FROM advert_company";

$qry_companies = mysql_query($query) or die($query);

if(isset ($attributes[company_id])){
    
        $query = "SELECT * FROM advert_company WHERE id = $company_id";
        
        $result = mysql_query($query) or die ($query);
        
        while ($row = mysql_fetch_assoc($result)){
        
             $company_name = $row[name];
             
             $check = $row[status];
                    
        }

}
?>
