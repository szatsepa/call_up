<?php

//    if(!isset ($_SESSION[user]))$type = $_SESSION[auth];

foreach ($prices_arr as $key => $value) {
    
$c_list_array = array();

$c_list_array = $value;

    if(count($c_list_array) == 0){
    
    ?>
>
<?php

}else{
    
unset($array_fields);

$array_fields = array();


$all_cost = 0;

$num = 0;

foreach ($c_list_array as $key => $value) {
    
    $num++;    

        $artikul = $value[str_code1];

	$img  = $value[imagin];

	$name = $value[str_name];
        
        $name_count = $value[str_name];

	$price = $value[num_price_single];

	$volume = $value[str_volume];

	$amount = $value[num_amount]; 
        
        $comment = $value[comment];
	       
        $price_id = $value[price_id];
        
        $status = $value[status];
        
        $is_cart = null;
        
        if($value[status] == "Отложен"){
            
            $str_act = "to_reserved";
            
        }  else {
            
            $str_act = "to_order";
            
            $is_cart = 1;
                        
        }
        
        if(strlen($name)>64){
            
            $name = iconv("UTF-8", "WINDOWS-1251", $name);
            
            $name = substr($name, 0, 64)."...";
            
            $name = iconv("WINDOWS-1251", "UTF-8", $name);
            
        }
        
        $type = substr($str_act, 3);
        
        $count_volume = count_Volume($name_count, $price_id); 
        
        if($count_volume > 0){
            
            $list_volume = list_Volume ($name_count, $price_id);
            
//             print_r($list_volume);
            
             $position = 0;
                                    
             $posart = 0;
                                    
             foreach($list_volume  as $key => $val){
                                        
                            $list_volume[$key][position] = $position;
                                        
                             if($artikul == $list_volume[$key][str_code1])$posart = $position;
                                        
                              ++$position;   
             }
                                    
        }
        
        include 'dsp_cart_plus.php';
    
}?>
 <div class = "oplatit_chk">
     
     <div class="advert_cart_plus_1">
        <?php $str = get_Advert(696, 101, $advert_array,3); echo $str;?>
</div>
      <div class="advert_cart_plus_2">                            
<!--             <div class = "pay_chk"> </div>-->
                   
                 <div id = "summa_chk">

<p align="center" valign="center"> Итого: <?php echo $all_cost;?>  р. </p>

</div>

<!--<br/>
<br/>-->
                 
                <div id = "btn_oplatit_chk"> 
<p align="center">
<?php if(!isset ($_SESSION[user])) echo "<a href='index.php?act=regs&stid=$attributes[stid]&price_id=$price_id&cod=$attributes[cod]'>Заказать.</a>";?>                
<?php if(isset ($_SESSION[user]) && $is_cart == 1) echo "<a href='index.php?act=advance&stid=$attributes[stid]&price_id=$price_id'>Заказать.</a>";?> 
<?php if(isset ($_SESSION[user]) && $is_cart == 0) echo "<a href='index.php?act=private_office&stid=$attributes[stid]'>Заказать.</a>";?>                    
</p>     
                </div>            
             </div>
             
</div>
<?php
    }
}
?>