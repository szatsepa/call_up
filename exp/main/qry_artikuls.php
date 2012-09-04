<?php

function artikul($pid){
    
    if($select == "default"){
        
        $plid = 2;
        
    }else{
        
        $plid = intval($pid);
    }
    
    
     
    $query = "SELECT    pl.id AS price_id,
                        p.comment,
                        pl.str_code1, 
                        pl.str_barcode, 
                        pl.str_name, 
                        pl.str_state, 
                        pl.str_volume, 
                        pl.num_price_single,
                        CONCAT(gp.id, '.',gp.extention) AS img 
                 FROM   price AS p, 
                        pricelist AS pl,
                        goods_pic AS gp
                    WHERE p.id = pl.pricelist_id 
                      AND pl.str_code2 <> 'X'
                      AND p.status <> 2
                      AND pl.str_barcode = gp.barcode
                      AND gp.pictype = 1
                      AND pl.pricelist_id = $plid
                 ORDER BY pl.str_code1 ";
    
    $qry_images = mysql_query($query) or die($query);
    
    return $qry_images;  
}
?>
