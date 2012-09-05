<select id="sel_price" class="common">
<!--    <option value="0"></option> -->
    <?php 
    
         
    foreach ($prices as $key => $value) {
          if((isset($attributes[pid]) and $attributes[pid] == $key) OR $_SESSION[pid] == $key){ ?> 
              <option value="<?php echo $key;?>" selected><?php echo $value;?></option> 
         <?php 
    
         }else{
                  
         ?>
              <option value="<?php echo $key;?>"><?php echo $value;?></option> 
                  
         <?php 
         
         }
                     
    }
    ?>
    </select>
