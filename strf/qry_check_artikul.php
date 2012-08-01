<?php

$storefront_id = quote_smart($attributes[stid]);

$query = "SELECT pl.id, pl.str_code1 AS artikul
 FROM storefront AS s, storefront_data AS  sdt, price AS p, pricelist AS pl, goods_pic AS gp
                    WHERE s.id = $storefront_id AND s.id = sdt.storefront_id AND sdt.price_id = p.id AND p.id = pl.pricelist_id AND pl.str_barcode = gp.barcode
ORDER BY pl.str_name";

$qry_check = mysql_query($query) or die($query);

  
   $index_arr = array();
    
   while($row = mysql_fetch_assoc($qry_check)){
       
       array_push($index_arr, $row);
       
   }

?>
