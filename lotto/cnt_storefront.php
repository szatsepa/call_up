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
        
        $page = intval($attributes[page]);
        
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

$tmp_array = array();

$qry_images = artikul($attributes[stid], $attributes[select], $attributes[group]);


if($qry_images){
    
        
   $str = $attributes[str];

    while($row = mysql_fetch_assoc($qry_images)) {
        
        $artikul = new Artikul();
                    
        if(isset ($attributes[search]) and preg_match("/$str/i", $row[str_name])){
           
                $_SESSION[ok] = 1;
                
                $artikul->setArtikul($row[id], $row[str_name], $row[str_code1], $row[num_price_single], $row[str_volume]);
         
                array_push($tmp_array, $artikul);
                
                }
                if(!isset ($attributes[search])){
                    
                $_SESSION[ok] = 0;
                
                $artikul->setArtikul($row[id], $row[str_name], $row[str_code1], $row[num_price_single], $row[str_volume]);
         
                array_push($tmp_array, $artikul);
                
                
                }

        }

} 
unset ($artikul);

$var = new Artikul();

if(count($tmp_array) < 9){
    
    for($i = count($tmp_array); $i < 10; $i++){
        
         if(!($tmp_array[$i]->name)) {
             
              $var ->setArtikul(null, null, null, null, null);
              
              array_push($tmp_array, $var);
                      
         }
       
    }
    
}

$store_arr = array();

unset ($var);

//$tmp_arr = $store_arr;

foreach ($tmp_array as $key => $value) {
    
   if($key < 9){
       
       $store_arr[$key] = $value;
       
   }else{
       
       $store_arr[$key+1] = $value;
   }
    
}

$huj = new Artikul();

$huj->setArtikul(NULL, null, NULL, NULL, NULL);

$store_arr[9] = $huj;  

unset ($huj);

ksort($store_arr);

unset ($tmp_arr);

$cnt = count($store_arr);
?>