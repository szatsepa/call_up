<?php

    $name = quote_smart($art_arr[str_name]);
        
    $name_artikul = new Name_artikul();
    
    $name_artikul->setName_artikul($name, $attributes[artikul]);
    
    
  if(isset ($attributes[cod])) $str_code = "&amp;cod=$attributes[cod]";
  
  $imgs_array = art_Images($attributes[artikul]);          
  
  $item_img = $art_arr[id].".jpg";
  
  
  if(isset ($attributes[img]) && count($imgs_array)){
      
      $img = intval($attributes[img]);
      
      if($img == count($imgs_array)){
          
          $img = 0;
          
          $item_img = $art_arr[id].".jpg";
          
      }  else {
          
          $item_img = $imgs_array[$img][id].'.'.$imgs_array[$img][extention];
          
      }
      
      
      
  }
  
?>
