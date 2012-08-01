<?php
include 'qry_artikul.php'; 

if(!isset($attributes[select])){
    $attributes[select] = "default";
}

 unset($_SESSION[ok]);

 $price = price_name($attributes[stid]);
 

// определим номер страницы и позицию первого товара в массиве

if (isset($attributes[page]) and $attributes[page] > 1){
    
        $start = $attributes[page];
        
        $start = $start*20;
        
        $page = $attributes[page];
        
}else{
        $start = 0;
        
        $page = 1;
}


// очищаем массив если таковой имеется

if(isset ($store_arr)){

    while(count($name_arr)){
        array_pop($store_arr);
    }
}

//создадим массив для хранения товаров витрины

$store_arr = array();

$qry_images = artikul($attributes[stid], $attributes[select], $attributes[group]);


if($qry_images){
    
   $str = $attributes[str];

    while($row = mysql_fetch_assoc($qry_images)) {
        
        $artikul = new Artikul();
                    
        if(isset ($attributes[search]) and preg_match("/$str/i", $row[str_name])){
           
                $_SESSION[ok] = 1;
                
                $artikul->setArtikul($row[id], $row[str_name], $row[str_code1], $row[num_price_single], $row[str_volume]);
         
                array_push($store_arr, $artikul);
                
                }
                if(!isset ($attributes[search])){
                    
                $_SESSION[ok] = 0;
                
                $artikul->setArtikul($row[id], $row[str_name], $row[str_code1], $row[num_price_single], $row[str_volume]);
         
                array_push($store_arr, $artikul);
                
                
                }

        }

} 
$cnt = count($store_arr);
?>