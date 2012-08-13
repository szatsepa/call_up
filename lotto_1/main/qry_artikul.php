<?php

function artikul($st_id, $select, $group, $search){
    
    if($select == "group" && $group == 'default'){
        
        unset ($select);
    }
    
    $group_1 = quote_smart($group);
     
    if(!isset ($select) or $select == 'default'){
    
        if($search == 'S'){
           if(isset($_POST[str])){ 
            $string = "%".$_POST[str]."%";
           }  else {
             $string = "%".$_GET[str]."%";  
           }
            
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
        AND pl.str_code2 <> 'X'
        AND p.status <> 2
        AND gp.pictype = 1
            AND pl.str_name LIKE '$string'
            GROUP BY pl.str_name
                    ORDER BY pl.str_barcode";
             
        }else{
            
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
        AND pl.str_code2 <> 'X'
        AND p.status <> 2
        AND gp.pictype = 1
            GROUP BY pl.str_name
                    ORDER BY pl.str_barcode";
        }
        
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
        AND pl.str_code2 <> 'X'
         AND p.status <> 2
                    AND pl.str_barcode = gp.barcode
        AND gp.pictype = 1
        GROUP BY pl.str_name
                    ORDER BY  pl.num_price_single ASC";

                        
        
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
        AND pl.str_code2 <> 'X'
         AND p.status <> 2
                    AND pl.str_barcode = gp.barcode
        AND gp.pictype = 1
        GROUP BY pl.str_name
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
        AND pl.str_code2 <> 'X'
         AND p.status <> 2
                    AND pl.str_barcode = gp.barcode
        AND gp.pictype = 1
        GROUP BY pl.str_name
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
        AND pl.str_code2 <> 'X'
         AND p.status <> 2
                    AND pl.str_barcode = gp.barcode
        AND gp.pictype = 1
                    AND pl.str_group = $group_1
        GROUP BY pl.str_name
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
        AND pl.str_code2 <> 'X'
         AND p.status <> 2
                    AND pl.str_barcode = gp.barcode
        AND gp.pictype = 1
                    AND pl.pricelist_id = $group_1
        GROUP BY pl.str_name
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
        AND pl.str_code2 <> 'X'
         AND p.status <> 2
                    AND pl.str_barcode = gp.barcode
                    AND gp.pictype = 1
                    AND p.rubrika = $group_1
                    AND r.id = p.rubrika
        GROUP BY pl.str_name
                    ORDER BY  pl.str_name ASC ";
    }
    
//    echo "$query<br/>";
    
    $qry_images = mysql_query($query) or die($query);

        

          return $qry_images;  
                
    }
?>
