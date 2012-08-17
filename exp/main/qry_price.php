<?php 
if(isset($attributes[border]) and $attributes[border] == "max") {
	$query = "SELECT id,str_code1,str_barcode,str_code2,str_name,str_state,str_volume,str_package,num_price_single,num_price_pack,num_amount,pricelist_id 
FROM pricelist 
WHERE pricelist_id=$price_id AND num_amount > 0 order by num_amount desc";
}

if(isset($attributes[border]) and $attributes[border] == "min") {
	$query = "SELECT id,str_code1,str_barcode,str_code2,str_name,str_state,str_volume,str_package,num_price_single,num_price_pack,num_amount,pricelist_id 
FROM pricelist 
WHERE pricelist_id=$price_id AND num_amount > 0 order by num_amount";
}

if(isset($attributes[group]) and $attributes[group] != "") {

	$attributes[group] = quote_smart($attributes[group]);

	$query = "SELECT id,str_code1,str_barcode,str_code2,str_name,str_state,str_volume,str_package,num_price_single,num_price_pack,num_amount,pricelist_id 
FROM pricelist 
WHERE pricelist_id=$attributes[pricelist_id] AND str_group = $attributes[group] and  num_amount > 0";
}

if(isset($attributes[pricelist_id]) and isset($attributes[artikul]) and $attributes[act] !='add_cart'){

	$artikul = quote_smart($attributes[artikul]);

	$query = "SELECT id,str_code1,str_barcode,str_code2,str_name,str_state,str_volume,str_package,num_price_single,num_price_pack,num_amount,pricelist_id 
FROM pricelist 
WHERE pricelist_id=$attributes[pricelist_id] AND str_code1=$artikul and  num_amount > 0";
}


if (isset($attributes[group]) and $attributes[group] == ''){
    unset($attributes[group]);
    unset($attributes[border]);
}

if (isset($attributes[border]) and $attributes[border] == ''){
    unset($attributes[group]);
    unset($attributes[border]);
}

// Выборка по умолчанию
// --Здесь убрано num_amount > 0
if(!isset($attributes[group]) and !isset($attributes[border])) {

	if ($attributes[act] =='single_price' or $attributes[act] =='add_cart' or $attributes[act] == 'add_favprice' ) {
   
		$query = "SELECT id,
	                     str_code1,
	                     str_barcode,
	                     str_code2,
	                     str_name,
	                     str_state,
	                     str_volume,
	                     str_package,
	                     num_price_single,
	                     num_price_pack,
	                     num_amount,
	                     pricelist_id 
	              FROM   pricelist 
	              WHERE  pricelist_id=$attributes[pricelist_id] AND
				  		 str_code2 <> 'X' AND 
						 num_amount > 0
	              ORDER  BY id";
	}
	
	if($attributes[act] == 'edit_price') {
	
		$query = "SELECT id,
                     str_code1,
                     str_barcode,
                     str_code2,
                     str_name,
                     str_state,
                     str_volume,
                     str_package,
                     num_price_single,
                     num_price_pack,
                     num_amount,
                     pricelist_id 
              FROM   pricelist 
              WHERE  pricelist_id=$attributes[pricelist_id] AND
					 str_code2 <> 'X'
              ORDER  BY id";
		
	}
	
}

$qry_price = mysql_query($query) or die($query);

$storefront_id = quote_smart($attributes[stid]);

$qry_pricess = mysql_query("SELECT price_id FROM storefront_data WHERE storefront_id = $storefront_id");

$group_array = array();

$favorite_array = array();

$aboutprice_arr = array();

while ($rows = mysql_fetch_assoc($qry_pricess)){

    $query3 = "SELECT DISTINCT str_group FROM pricelist WHERE pricelist_id= $rows[price_id] ORDER BY str_group";
   
    $qry_group = mysql_query($query3) or die($query3);
    
    while ($row = mysql_fetch_assoc($qry_group)){
        
        array_push($group_array, $row);
    }   

    
    if (isset ($_SESSION[auth]) && $_SESSION[auth] == 1) {
        
    $user_for_select = $_SESSION[user]->data[id];
    
    } else {
        
        $user_for_select = 0;
    }
    
    $query4 = "SELECT user_id FROM kabinet 
              WHERE price_id=$rows[price_id] 
              AND user_id=$user_for_select";
    $qry_favorite = mysql_query($query4) or die($query4);
    
    while ($row = mysql_fetch_assoc($qry_favorite)){
        
        array_push($favorite_array, $row);
        
    }
    
   
    
    $query5 = "SELECT p.id,
                      p.comment price_name,
                      c.id company_id,
                      c.name company_name,
                      p.status,
					  p.zakaz_limit
               FROM price AS p, companies AS c
               WHERE p.company_id = c.id AND
                     p.id = $rows[price_id]";
    
    $qry_aboutprice = mysql_query($query5) or die($query5);
    
    while ($row = mysql_fetch_assoc($qry_aboutprice)){
        
        array_push($aboutprice_arr, $row);
    }
    
//    echo "<br/> PRICE_ID -> $rows[price_id]";
    
     }
    
?>