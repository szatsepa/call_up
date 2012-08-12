<?php

include 'qry_artikul.php'; 

if(!isset($attributes[select])){
    $attributes[select] = "default";
}

 unset($_SESSION[ok]);

 $price = price_name($attributes[stid]);

// очищаем массив если таковой имеется

if(isset ($store_arr)){

    while(count($name_arr)){
        array_pop($store_arr);
    }
}

//создадим массив для хранения товаров витрины

$tmp_array = array();

$qry_images = artikul($attributes[stid], $attributes[select], $attributes[group], $attributes[search]);


if($qry_images){
         
//   $str = mysql_real_escape_string($attributes[str]);

    while($row = mysql_fetch_assoc($qry_images)) {
        
        $artikul = new Artikul();
        
                $_SESSION[ok] = 0;
                
                $artikul->setArtikul($row[id], $row[str_name], $row[str_code1], $row[num_price_single], $row[str_volume], $row[price_id]);
         
                array_push($tmp_array, $artikul);
        }

}

if(count($tmp_array) == 0 or !count($tmp_array)){
    ?>

<script type="text/javascript">
    alert("Поисковый запрос вернул пустой результат!");
    document.location.href = "index.php?act=look&stid=<?php echo $attributes[stid];?>&cod=<?php echo $attributes[cod];?>";
</script>
    <?php
} 
unset ($artikul); 

$var = new Artikul();

if(count($tmp_array) < 9){
    
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
    
   if($key < 9){
       
       $store_arr[$key] = $value;
       
   }else{
       
       $store_arr[$key+1] = $value;
   }
    
}

$huj = new Artikul();

$huj->setArtikul(NULL, null, NULL, NULL, NULL,NULL);

$store_arr[9] = $huj;  

unset ($huj);

ksort($store_arr);

unset ($tmp_arr);

$cnt = count($store_arr);
?>