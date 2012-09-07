<?php

    $name = quote_smart($art_arr[str_name]);
    
    $price_id = intval($attributes[price_id]);
        
    $name_artikul = new Name_artikul();
    
    $name_artikul->setName_artikul($name, $attributes[artikul],$price_id);
  
    ?>
<script type="text/javascript">
    var artikul = {group:"<?php echo $name_artikul->group;?>", artikul:"<?php echo $attributes[artikul];?>",uid:<?php echo $_SESSION[id];?>};
</script>
<?php
    
  if(isset ($attributes[cod])) $str_code = "&amp;cod=$attributes[cod]";
  
  $imgs_array = art_Images($attributes[artikul]);  
  
   $item_img = $imgs_array[0][id].'.'.$imgs_array[0][extention];
  
?>
