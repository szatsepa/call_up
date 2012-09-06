<?php

//$storefront_id = quote_smart($attributes[stid]); 

$pid = intval($_SESSION[pid]);

$query = "SELECT pl.id, pl.str_code1 AS artikul
            FROM  
                  price AS p, 
                  pricelist AS pl, 
                  goods_pic AS gp
             WHERE p.id = $pid 
               AND p.id = pl.pricelist_id 
               AND pl.str_barcode = gp.barcode
               AND p.status <> 2
            ORDER BY pl.str_name";

$qry_check = mysql_query($query) or die($query);

  
   $index_arr = array();
    
   while($row = mysql_fetch_assoc($qry_check)){
       
       array_push($index_arr, $row);
       
   }

?>
