<?php
include 'cnt_storefront.php';

if($cnt > 0){


//определим количество страниц

$pages = floor(($cnt/90));


?>
<div class = "contennt_chk" id="cont"> 
    <?php

 if(isset($attributes[page])){
     
     $page = intval($attributes[page]);
     
     $start = 90*($page-1); 
     
 } else{
     
     $start = 0;
     
     $page = 1;
 } 
 
 $_SESSION[page] = $page;
     
$address = "";
    
if(isset ($attributes)){
    unset($attributes[current_language]);
    unset($attributes[PHPSESSID]);
    unset($attributes[act]);
    unset ($attributes[x]);
    unset($attributes[y]);
    unset ($attributes[page]);
    foreach ($attributes as $key => $value) {
        
        if($value)$address .= "&$key=$value";

    }
    
}
 
include 'dsp_pager.php';

if(($start+90)>$cnt){ 
    
	$start = $cnt - 90;
        
}
    
if($start < 0){
    
	$start = 0;
        
}
//выводим на экран 

$cnt_art = 0;

$lenght = count($store_arr);

$pos_adv = 0;

for($i=0;$i<9;$i++){
    
    ?>
   <div class = "stroka_vitriny"> 
       <input type="hidden" id="uid" value="<?php echo $_SESSION[id];?>"/>
       <input type="hidden" id="page" value="<?php echo $page;?>"/> 
       <?php
       if(!isset($_SESSION[id])){
       ?>
       <input type="hidden" id="cod" value="<?php echo $attributes[cod];?>"/> 
       <?php
       }
       ?>
       
<!--       строка витрины-->
       
       <?php

	for($ii=0;$ii<10;$ii++){
            
            $ind = $i*10+$ii;
            if($ind < 10){$ind = "0".$ind;}

            if(!$store_arr[$start]){
                break;
            }

            $id = $store->id;
            $artikul_i = $store_arr[$start]->artikul;
            $image = $store_arr[$start]->image;
            $name = $store_arr[$start]->name;
            $stid = $store->price_name;
            $volume = $store_arr[$start]->volume;
            $price = $store_arr[$start]->price;
            $price_id = $store_arr[$start]->price_id;
            $num = rand(3, 6);
            $cirkles = $num."_circles.jpg";
            
             $name = iconv("UTF-8", "WINDOWS-1251", $name);
	
		$name = substr($name,0,42)."...";
                
                $name = iconv("WINDOWS-1251", "UTF-8", $name);
            
 if($artikul_i){

           ?> 
                    <div class = "kard_vtrn" id="<?php echo $artikul_i;?>">
                            <div class = "img_vtrn" id="im_<?php echo $ind;?>">
                                    <input class='my_button' id='<?php echo $ind;?>' name ="<?php echo $artikul_i;?>" type="image" src="main/act_prewiew.php?src=http://call-up.ru/images/goods/<?php echo $image;?>&amp;width=60&amp;height=60"/>
                            </div>
                    </div>
                 
         <?php       
}
              $start++; 

         $pos_adv++;      

	}
  
}
?> 
</div>   
   <?php 
include 'dsp_pager.php';

if(isset($attributes[order])){
    ?>
   <script language="javascript">alert('Заказ отправлен в обработку.');</script>
	<?php }

if(isset($attributes[pas]) && $attributes[pas] == 1){
    ?>
   <script language="javascript">alert('Заказ отправлен в обработку.');</script>
	<?php }

if(isset($attributes[reg]) && $attributes[reg] == 10){
    ?>
   <script language="javascript">alert('Уже есть зарегистрирований пользователь с таким ключем.');</script>
	<?php }
        
        if(isset($attributes[reg]) && $attributes[reg] == 11){
    ?>
   <script language="javascript">alert('С этого IP-адреса уже есть зарегистрированый пользователь.');</script>
	<?php }
        
  unset ($attributes[reg]);
  
  unset($attributes[affected]);
  
}
?>


