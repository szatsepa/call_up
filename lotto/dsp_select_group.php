<select id="selector" class="common" name="group" onchange="document.location='index.php?act=look&select=group&group='+this.options[this.selectedIndex].value+'&stid=<?php echo $attributes[stid];?>&cod=<?php echo $attributes[cod];?>'">
        
        <option value="default">Выбрать группу</option>
        
    <?php 
    
         $groups = groupInPrice($attributes[stid]);
    
    foreach ($groups as $key => $value) {
          if(isset($attributes[group]) and $attributes[group] == $value){ ?>
              <option value="<?php echo $value;?>" selected><?php echo $value;?></option>
         <?php 
    
         }else{
                  
         ?>
              <option value="<?php echo $value;?>"><?php echo $value;?></option>
                <?php }
         
                     
    }
    ?>
    </select>
 