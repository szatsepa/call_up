
<!--    <select id="selector" name="group" onchange="return selectGroup(<?php echo $attributes[stid];?>),<?php echo $_SESSION[domen];?>">-->
 
    <select id="selector" name="group" class="common" >
        
        <option value="default" selected>Выбрать группу</option>
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
 