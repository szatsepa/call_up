<?php 

function count_cart($first, $who, $cod){
    
//    $first - ай_ди ползователя
//    $who - значения 0 и 1 0 - пользователь с главной 1 - клиент витрины
//    $k - третий аргумант пока хто иво знат зачем - но возможно индекс витрины
    
    if(isset($who) && $who == 1) {
        $hto_tam = "user_id";
    }else if(isset($who) && $who == 2){
        $hto_tam = "customer";
    }else if(isset ($cod) && !isset ($who)){
        $hto_tam = "cod";
        
        $first = $cod;
    }
    
	$count = 0;
                              
        $query = "SELECT num_amount
                        FROM cart
                        WHERE $hto_tam = $first";
            
            
            
                
                     $res = mysql_query($query) or die($query);
                
                while ($cnt_row = mysql_fetch_assoc($res)){
                    
                    $count += $cnt_row[num_amount];
                }
                
        $query = "SELECT num_amount
                        FROM reserved_items
                        WHERE $hto_tam = $first";
            
            
            
                
                     $res = mysql_query($query) or die($query);
                
                while ($cnt_row = mysql_fetch_assoc($res)){
                    
                    $count += $cnt_row[num_amount];
                }        

	return $count;
}

function good_image($artikul){
    
    $artikul = quote_smart($artikul);

    $query = "SELECT gp.id, p.str_name,
                    p.str_volume, 
                    p.num_price_single, 
                    pr.comment 
                    FROM goods_pic AS gp, 
                    pricelist AS p, 
                    price AS pr 
                    WHERE gp.barcode = p.str_barcode 
                    AND pr.id = p.pricelist_id 
                    AND p.str_code1 = $artikul
                    AND gp.pictype <> 2
                    ORDER BY gp.id";

$qry_img = mysql_query($query) or die($query);

$artikul_arr = mysql_fetch_assoc($qry_img);


return $artikul_arr;

}

function good_description($artikul, $price_id){
    
    $artikul = quote_smart($artikul);
    
    

   $query = "SELECT g.short_description, 
                    g.ingridients, 
                    g.specification, 
                    g.gost 
                    FROM goods AS g
                    WHERE g.barcode =(SELECT str_barcode FROM pricelist WHERE str_code1 = $artikul AND pricelist_id=$price_id)";

$qry_description = mysql_query($query) or die($query);

$description = mysql_fetch_assoc($qry_description);

$cnt = mysql_num_rows($qry_description);


if($cnt == 0){

	return 0;

}else{

return $description;

}

}

function goods_list($storefront_id, $artikul){

	$list_arr = array();

	$position = 0;
        
        $querry = "SELECT price_id FROM storefront_data WHERE storefront_id = $storefront_id";
        
        $result = mysql_query($querry) or die ($querry);
        
        while ($row = mysql_fetch_row($result)){
            
            $id = $row[0];
            
            $query = "SELECT pl.str_code1, 
                        gp.id, pl.str_name, 
                        p.comment, pl.str_volume, 
                        pl.num_price_single 
                    FROM pricelist AS pl, 
                        goods_pic AS gp, 
                        price AS p 
                    WHERE gp.barcode = pl.str_barcode 
                        AND pl.pricelist_id = p.id
                        AND p.status <> 2
                        AND p.id = $id";
	
	$qry_list = mysql_query($query) or die($query);


	while($pr_list = mysql_fetch_assoc($qry_list)){

		array_push($list_arr,$pr_list);
	}
            
        }

	

	for($i = 0;$i < count($list_arr); $i++ ) {
		
		$position++;

		if($artikul == $list_arr[$i][str_code1]){
			
			break;

		}
	}

	$out_arr = array();

	for($i = ($position - 2);$i < ($position + 2);$i++){

		
		
			array_push($out_arr,$list_arr[$i]);

		if($i != $position){}

	}

	return $out_arr;

}
 
function goods_rnd($storefront_id, $artikul){

	$list_arr = array();
        
        $queris = "SELECT price_id FROM storefront_data WHERE storefront_id = $storefront_id";
        
        $result = mysql_query($queris) or die ($queris);
        
        while ($row = mysql_fetch_row($result)){
            
            $id = $row[0];
            
            $query = "SELECT pl.str_code1, 
                        gp.id, pl.str_name, 
                        p.comment, pl.str_volume, 
                        pl.num_price_single,
                        p.id AS price_id
                    FROM pricelist AS pl, 
                        goods_pic AS gp, 
                        price AS p 
                    WHERE gp.barcode = pl.str_barcode 
                        AND pl.pricelist_id = p.id 
                        AND p.status <> 2
                        AND gp.pictype = 1
                        AND p.id = $id";
	 
	$qry_list = mysql_query($query) or die($query);


	while($pr_list = mysql_fetch_assoc($qry_list)){

		array_push($list_arr,$pr_list);
	}
            
        }

	

	return $list_arr;

}
?>  