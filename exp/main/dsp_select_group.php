<select id="selector" class="common" name="group" onchange="javascript:gotoSelectedPage(this.options[this.selectedIndex])">
        
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
<script type="text/javascript">
    function gotoSelectedPage(val){   
//        var str = val;
        var page = 1;
        if(val.innerText == 'B'){
            page = 2;
        }else if(val.innerText == 'C'){
            page = 3;
        }
       document.location.href='?act=look&page='+page; 
    }
</script>