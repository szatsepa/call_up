<?php 

include 'qry_pricename.php';

//include 'qry_good_img.php';

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
    
    $description = good_description($attributes[artikul]);
    
    $art_arr = good_image($attributes[artikul]);

    $rnd_arr = goods_rnd($attributes[stid], $attributes[artikul]);

    $count = count($rnd_arr);

}

$first = $_SESSION[user]->data[id];

 if(!isset ($_SESSION[auth]) or $_SESSION[auth] == 0){
    
    $cod = quote_smart($attributes[cod]);

}
 
    $who = $_SESSION[auth]; 
    
    if(isset ($cod) && $cod == '') unset ($cod);

//    echo "<br>count_cart(user_id-> $first, auth-> $who, KOT-> $cod)";
    
$count_in_cart = count_cart($first, $who, $cod);
//
$str_product = array('товар','товара','товаров');

if($count_in_cart > 5 and $count_in_cart < 21){
    
    $string_out = $str_product[2];
    
}else{
    $cic = strval($count_in_cart);
    
    $cic = substr($cic, -1);
    
    if($cic == '1'){
       $string_out = $str_product[0]; 
    }else if($cic =='2' or $cic == '3' or $cic == '4'){
        $string_out = $str_product[1];
    }else{
        $string_out = $str_product[2];
    }
}
//
$string_count = '';

if($count_in_cart == 0){
    
    $string_count = "disabled";
    
}

unset ($prices_array);
?>

