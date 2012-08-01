<?php 

//$query2 = "SELECT * FROM cart ORDER BY Id";
//$qry_cart = mysql_query($query2) or die($query2);

// Для демо-режима разрешим только один прайс-лист
/*if (isset(user["role"]) and user["role"] == 2) {
	$attributes[pricelist_id] = 1;
}*/

$attributes[pricelist_id] = intval($attributes[pricelist_id]);

if($attributes[act] == 'step1' or $attributes[act] == 'step2'){
  // $attributes[pricelist_id] = 0;
}

if(isset($attributes[border]) and $attributes[border] == "max") {
	$query = "SELECT id,str_code1,str_barcode,str_code2,str_name,str_state,str_volume,str_package,num_price_single,num_price_pack,num_amount,pricelist_id 
FROM pricelist 
WHERE pricelist_id=$attributes[pricelist_id] AND num_amount > 0 order by num_amount desc";
}

if(isset($attributes[border]) and $attributes[border] == "min") {
	$query = "SELECT id,str_code1,str_barcode,str_code2,str_name,str_state,str_volume,str_package,num_price_single,num_price_pack,num_amount,pricelist_id 
FROM pricelist 
WHERE pricelist_id=$attributes[pricelist_id] AND num_amount > 0 order by num_amount";
}

if(isset($attributes[group]) and $attributes[group] != "") {

	$attributes[group] = quote_smart($attributes[group]);

	$query = "SELECT id,str_code1,str_barcode,str_code2,str_name,str_group,str_state,str_volume,str_package,num_price_single,num_price_pack,num_amount,pricelist_id 
FROM pricelist 
WHERE pricelist_id=$attributes[pricelist_id] AND str_group = $attributes[group] and  num_amount > 0";
}

if(isset($attributes[pricelist_id]) and isset($attributes[artikul]) and $attributes[act] !='add_cart'){

	$attributes[artikul] = quote_smart($attributes[artikul]);

	$query = "SELECT id,str_code1,str_barcode,str_code2,str_name,str_state,str_volume,str_package,num_price_single,num_price_pack,num_amount,pricelist_id 
FROM pricelist 
WHERE pricelist_id=$attributes[pricelist_id] AND str_code1=$attributes[artikul] and  num_amount > 0";
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
                     str_group,
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

//$pricelist_id = mysql_result($qry_price,0,'pricelist_id');

// Выберем группу
/*if(!isset($attributes[pricelist_id]) or $attributes[pricelist_id] = "") {
    $attributes[pricelist_id] = $pricelist_id;
}*/


    $query3 = "SELECT DISTINCT str_group FROM pricelist WHERE pricelist_id=$attributes[pricelist_id] ORDER BY str_group";
    $qry_group = mysql_query($query3) or die($query3);
    
    if ($authentication == "yes") {
    $user_for_select = $attributes[user_id];
    } else {
        $user_for_select = 0;
    }
    
    $query4 = "SELECT user_id FROM kabinet 
              WHERE price_id=$attributes[pricelist_id] 
              AND user_id=$user_for_select";
    $qry_favorite = mysql_query($query4) or die($query4);
    
    $query5 = "SELECT p.id,
                      p.comment price_name,
                      c.id company_id,
                      c.name company_name,
                      p.status,
					  p.zakaz_limit
               FROM price AS p, companies AS c
               WHERE p.company_id = c.id AND
                     p.id = $attributes[pricelist_id]";
    
    $qry_aboutprice = mysql_query($query5) or die($query5);
    
?>