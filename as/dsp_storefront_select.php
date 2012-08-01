<?php

/*
 * created by arcady 6.11.2011
 */
$cnt = count($stores);

if($cnt != 0){

echo '<select name="stid" class="common">';

$i = 0;
foreach ($stores as $key => $value) {

        $selected = "";
          
        $name = $value[name];
            
        $name = substr($name, 0, 46); 
        
        if(isset ($attributes[st_select]) && $attributes[st_select] == "select" && $attributes[stid] == $value[id]){
         echo  "<option size='32' value='".$value["id"]."' selected>".$name."</option>";
        }else if(!isset ($attributes[st_select]) && $i == 0){
         echo  "<option size='32' value='".$value["id"]."' selected >".$name."</option>";   
        }  else {
           echo  "<option size='32' value='".$value["id"]."' >".$name."</option>";  
        }
		$i++;
    }
 ?>
</select>  
 <?php 
  
 } 

?>