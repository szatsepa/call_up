<?php

include 'qry_artikuls.php'; 

if(!isset($attributes[pid])){
    $attributes[pid] = 2;
}

$_SESSION[pid] = $attributes[pid];

 unset($_SESSION[ok]);

 $price = price_name($attributes[stid]);

// очищаем массив если таковой имеется

if(isset ($store_arr)){

    while(count($name_arr)){
        array_pop($store_arr);
    }
}

if(!isset($attributes[page]) && isset($_SESSION[page])){
    $attributes[page] = $_SESSION[page];
}

//создадим массив для хранения товаров витрины

$tmp_array = array();

$qry_images = artikul($attributes[pid]);


if($qry_images){
         
//   $str = mysql_real_escape_string($attributes[str]);

    while($row = mysql_fetch_assoc($qry_images)) { 
        
        $artikul = new Artikul();
        
                $_SESSION[ok] = 0;  
                
                $artikul->setArtikul($row[img], $row[str_name], $row[str_code1], $row[num_price_single], $row[str_volume], $row[price_id]);
         
                array_push($tmp_array, $artikul);
}

}


unset ($artikul); 

$var = new Artikul();

if(count($tmp_array) < 999){
    
    for($i = count($tmp_array); $i < 10; $i++){
        
         if(!($tmp_array[$i]->name)) {
             
              $var ->setArtikul(null, null, null, null, null,NULL);
              
              array_push($tmp_array, $var);
                      
         }
       
    }
    
}

$store_arr = array();

unset ($var);

foreach ($tmp_array as $key => $value) {
    
   if($key < 999){
   
       $store_arr[$key] = $value;
       
   }else{
       
       $store_arr[$key+1] = $value;
   }
    
}

$huj = new Artikul();

$huj->setArtikul(NULL, null, NULL, NULL, NULL,NULL);

$store_arr[999] = $huj;  

unset ($huj);

ksort($store_arr);

unset ($tmp_arr);

$cnt = count($store_arr);
?>