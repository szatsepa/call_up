<?php

    $name = quote_smart($art_arr[str_name]);
    
    $price_id = intval($attributes[price_id]);
        
    $name_artikul = new Name_artikul();
    
    $name_artikul->setName_artikul($name, $attributes[artikul],$price_id);
//    echo "<br>";    
//    print_r($name_artikul);
//    echo "<br>";  
    ?>
<!--<script type="text/javascript">
    var artikul = {group:<?php echo $name_artikul->group;?>, artikul:<?php echo $attributes[artikul];?>,uid:<?php echo $_SESSION[id];?>,cod:<?php echo $attributes[cod];?>};
</script>-->
<?php
    
  if(isset ($attributes[cod])) $str_code = "&amp;cod=$attributes[cod]";
  
  $imgs_array = art_Images($attributes[artikul]);  
//  print_r($imgs_array);
  
//  $item_img = $art_arr[id].".jpg";
  
   $item_img = $imgs_array[0][id].'.'.$imgs_array[0][extention];
//  if(isset ($attributes[img]) && count($imgs_array)){
//      
//      $img = intval($attributes[img]);
//      
//      if($img == count($imgs_array)){
//          
//          $img = 0;
//          
//          $item_img = $art_arr[id].".jpg";
//          
//      }  else {
//          
//          $item_img = $imgs_array[$img][id].'.'.$imgs_array[$img][extention];
//          
//      }
//      
//      
//      
//  }
  
?>
