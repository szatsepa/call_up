<select id="selector" class="common">
        
        <option value="default">Выбрать группу</option>
    <?php 
    
         $groups = groupInPrice(2);
    
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
