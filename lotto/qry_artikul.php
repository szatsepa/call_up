<?php

function artikul($st_id, $select, $group){
    
    if($select == "group" && $group == 'default'){
        
        unset ($select);
    }
    
    $group = quote_smart($group);
    
    if(!isset ($select) or $select == 'default'){
    
        $query = "SELECT sdt.price_id,
                        p.comment,
                        pl.str_code1, 
                        pl.str_barcode, 
                        pl.str_name, 
                        pl.str_state, 
                        pl.str_volume, 
                        pl.num_price_single,
                        gp.id
                 FROM storefront AS s, 
                        storefront_data AS  sdt, 
                        price AS p, 
                        pricelist AS pl,
                        goods_pic AS gp
                    WHERE s.id = $st_id 
                    AND s.id = sdt.storefront_id 
                    AND sdt.price_id = p.id 
                    AND p.id = pl.pricelist_id 
                    AND pl.str_barcode = gp.barcode
        AND p.status <> 2
        AND gp.pictype = 1
                    ORDER BY pl.str_name";
        
    }else if (isset ($select) and $select == 'price'){
        $query ="SELECT  
                        sdt.price_id,
                        p.comment,
                        pl.str_code1, 
                        pl.str_barcode, 
                        pl.str_name, 
                        pl.str_state, 
                        pl.str_volume, 
                        pl.num_price_single,
                        gp.id 
                 FROM storefront AS s, 
                        storefront_data AS  sdt, 
                        price AS p, 
                        pricelist AS pl,
                        goods_pic AS gp
                    WHERE s.id = $st_id 
                    AND s.id = sdt.storefront_id 
                    AND sdt.price_id = p.id 
                    AND p.id = pl.pricelist_id 
         AND p.status <> 2
                    AND pl.str_barcode = gp.barcode
        AND gp.pictype = 1
                    ORDER BY  pl.num_price_single ASC";
//    GROUP BY pl.str_name
                        
        
    }else if (isset ($select) and $select == 'abc'){
        $query = "SELECT  
                        sdt.price_id,
                        p.comment,
                        pl.str_code1, 
                        pl.str_barcode, 
                        pl.str_name, 
                        pl.str_state, 
                        pl.str_volume, 
                        pl.num_price_single,
                        gp.id 
                 FROM storefront AS s, 
                        storefront_data AS  sdt, 
                        price AS p, 
                        pricelist AS pl,
                        goods_pic AS gp
                    WHERE s.id = $st_id 
                    AND s.id = sdt.storefront_id 
                    AND sdt.price_id = p.id 
                    AND p.id = pl.pricelist_id 
         AND p.status <> 2
                    AND pl.str_barcode = gp.barcode
        AND gp.pictype = 1
                    ORDER BY  pl.str_name ASC ";
    }else if (isset ($select) and $select == 'volume'){
        $query = "SELECT  
                        sdt.price_id,
                        p.comment,
                        pl.str_code1, 
                        pl.str_barcode, 
                        pl.str_name, 
                        pl.str_state, 
                        pl.str_volume, 
                        pl.num_price_single,
                        gp.id 
                 FROM storefront AS s, 
                        storefront_data AS  sdt, 
                        price AS p, 
                        pricelist AS pl,
                        goods_pic AS gp
                    WHERE s.id = $st_id 
                    AND s.id = sdt.storefront_id 
                    AND sdt.price_id = p.id 
                    AND p.id = pl.pricelist_id 
         AND p.status <> 2
                    AND pl.str_barcode = gp.barcode
        AND gp.pictype = 1
                    ORDER BY  pl.str_volume ASC ";
    }else if (isset ($select) and $select == 'group'){
        
//        $group = $attributes[group];
        
        $query = "SELECT  
                        sdt.price_id,
                        p.comment,
                        pl.str_code1, 
                        pl.str_barcode, 
                        pl.str_name, 
                        pl.str_state, 
                        pl.str_volume, 
                        pl.num_price_single,
                        gp.id 
                 FROM storefront AS s, 
                        storefront_data AS  sdt, 
                        price AS p, 
                        pricelist AS pl,
                        goods_pic AS gp
                    WHERE s.id = $st_id 
                    AND s.id = sdt.storefront_id 
                    AND sdt.price_id = p.id 
                    AND p.id = pl.pricelist_id
         AND p.status <> 2
                    AND pl.str_barcode = gp.barcode
        AND gp.pictype = 1
                    AND pl.str_group = $group
                    ORDER BY  pl.str_name ASC ";
    }else if (isset ($select) and $select == 'prices'){
        
//        $group = $attributes[group];
        
        $query = "SELECT  
                        sdt.price_id,
                        p.comment,
                        pl.str_code1, 
                        pl.str_barcode, 
                        pl.str_name, 
                        pl.str_state, 
                        pl.str_volume, 
                        pl.num_price_single,
                        gp.id 
                 FROM storefront AS s, 
                        storefront_data AS  sdt, 
                        price AS p, 
                        pricelist AS pl,
                        goods_pic AS gp
                    WHERE s.id = $st_id 
                    AND s.id = sdt.storefront_id 
                    AND sdt.price_id = p.id 
                    AND p.id = pl.pricelist_id 
         AND p.status <> 2
                    AND pl.str_barcode = gp.barcode
        AND gp.pictype = 1
                    AND pl.pricelist_id = $group
                    ORDER BY  pl.str_name ASC ";
    }else if (isset ($select) and $select == 'R'){
        
//        $group = $attributes[group];
        
        $query = "SELECT  
                        sdt.price_id,
                        p.comment,
                        pl.str_code1, 
                        pl.str_barcode, 
                        pl.str_name, 
                        pl.str_state, 
                        pl.str_volume, 
                        pl.num_price_single,
                        gp.id 
                 FROM storefront AS s, 
                        storefront_data AS  sdt, 
                        price AS p, 
                        pricelist AS pl,
                        goods_pic AS gp,
                        rubrikator AS r
                    WHERE s.id = $st_id 
                    AND s.id = sdt.storefront_id 
                    AND sdt.price_id = p.id 
                    AND p.id = pl.pricelist_id 
         AND p.status <> 2
                    AND pl.str_barcode = gp.barcode
                    AND gp.pictype = 1
                    AND p.rubrika = $group
                    AND r.id = p.rubrika
                    ORDER BY  pl.str_name ASC ";
    }
    
    $qry_images = mysql_query($query) or die($query);
    

    
          return $qry_images;  
       
}
?>
