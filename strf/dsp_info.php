<?php

/*
 * created by arcady.1254@gmail.com 25/1/2012
 */
$fields = array("about"=>"about_store","office"=>"head_office","discount"=>"discount","warranty"=>"warranty","delivery"=>"delivery", "payment"=>"payment");

$titles = array("about_store"=>"О магазине","head_office"=>"Центральный офис","discount"=>"Скидки","warranty"=>"Гарантия","delivery"=>"Доставка","payment"=>"Способы оплаты");

$key = $fields[$attributes[info]];

$p_title = $titles[$key];
     
//print_r($adverticement_array);

?>
<div class="specification">
    <div class="spec_text" align="justify">
        <h2>&nbsp;&nbsp;&nbsp;<?php echo $p_title;?>.</h2>
         <br/>
         <br/>
         <p>
            <?php echo $info[$key]; ?>
         </p>
         <br/>
         
             
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