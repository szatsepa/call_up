<?php 

include 'qry_pricename.php';

$prices_array = price_name($attributes[stid]); 

foreach ($prices_array as $key => $value) {
       
    $price = new Price();
    
    $price->setPrice($value[price_id], $value[comment]);
    
    $storefront->setStore($price);
}

 
if($attributes[act] == 'change_volume'){
    
    $art_arr = good_image($attributes[art]);
    
}

if($attributes[act]=='item_description'){
    
    
    $beside_arr = goods_list($attributes[stid], $attributes[artikul]);
    
    $description = good_description($attributes[artikul], $attributes[price_id]);
    
    $art_arr = good_image($attributes[artikul]);

    $rnd_arr = goods_rnd($attributes[stid], $attributes[artikul]);

    $count = 0; 

}

$first = $_SESSION[user]->data[id];

unset ($prices_array);
?> 
