<?php

function contrlStep($id,$step,$arr){
    
  $position = 0; 
  
   $art_arr = $arr;
   
   foreach ($arr as $ps => $value) {
       foreach ($value as $key => $values) {
           if($key == "id" && $values == $id){
               $position = $ps;
           }
       }
       
   }
 
 $btn = array('artikul'=>$art_arr[($position+$step)][artikul],'id'=>$art_arr[($position+$step)][id]);  
   
if(($position == (count($art_arr)-1) && $step > 0) or ($position == 0 && $step < 0)){
      
        $btn = array('status'=>'disabled');
        
    }
  
 return $btn;    
}

     $name = quote_smart($art_arr[str_name]);
        
    $name_artikul = new Name_artikul();
    
    $name_artikul->setName_artikul($name, $attributes[artikul]);

?>
