<?php

/*
 * created by arcady.1254@gmail.com 19/1/2012
 */

$artikul = quote_smart($attributes[artikul]);

$description = good_description($artikul);

?>
<div class="specification">
    <div class="spec_text" align="justify">
        <h2>&nbsp;&nbsp;&nbsp;Подробное описание товара.</h2>
         <br/>
         <br/>
         <p>
            <?php echo $description[specification]; ?>
         </p>
         <br/>
         <h2>&nbsp;&nbsp;&nbsp;Ингридиенты.</h2>
         <br/>
         <br/>
         <p>
             <?php echo $description[ingridients]; ?>
         </p>
             
    </div>
    <div class="spec_advert">
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
         <?php 
         
         $pos = rand(0, (count($adverticement_array)-1));
         
         if($adverticement_array){
             
            echo '<form action="http://'.$adverticement_array[$pos][where_from].'" method="post"  target="_blank">
            <input type="image" src="http://'.$_SESSION[domen].$adverticement_array[$pos][name].'" width="200" alt="'.$adverticement_array[$pos][name].'"/>        
        </form>';
            
         } ?>
    </div>
</div>