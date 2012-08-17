<?php

/*
 * created by arcady.1254@gmail.com 21.12.2011
 */
?>
 
    <select id="selector" name="group" class="common"  onchange="document.location='index.php?act=look&select=R&group='+this.options[this.selectedIndex].value+'&stid=<?php echo $attributes[stid];?>&cod=<?php echo $attributes[cod];?>'">
        
        <option value="default" selected>Выбрать рубрику</option>
    <?php 
    
         $rub_arr = rubrikasInStorefront($attributes[stid]);
    
    
    
      foreach ($rub_arr as $key => $value) {
          if(isset($attributes[group]) and $attributes[group] == $value[id]){ ?>
              <option value="<?php echo $value[id];?>" selected><?php echo $value[name];?></option>
         <?php 
    
         }else{
                   
         ?>
              <option value="<?php echo $value[id];?>"><?php echo $value[name];?></option>
                <?php }
         
                     
    }
    ?>
    </select>
