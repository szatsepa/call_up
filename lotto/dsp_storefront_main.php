 
<!--контент-->
	
<?php
include 'cnt_storefront.php';


if($cnt == 0){ 
    
?>
 <script language="javascript">
     alert("Товар с таким названием не найден.")
    window.location.href = "index.php?act=look&stid=<?php echo $attributes[stid];?>&cod=<?php echo $attributes[cod];?>";
 </script>

<?php
}else{



if(!isset ($_SESSION[auth]) or $_SESSION[auth]==0){
    
    $address = "&amp;cod=$attributes[cod]&amp;stid=$attributes[stid]";
}else{
    $address = "&amp;stid=$attributes[stid]";
}
//определим количество страниц

$pages = ceil(($cnt/20));

include 'dsp_pager.php';

?>

<div class = "contennt_chk">
<!--    <div class="strf_block">-->
    <?php
    
 if(isset($attributes[page])){
     
     $pg = $attributes[page];
     
     $start = 20*($pg-1);
     
 } else{
     
     $start = 0;
 } 
// echo "dlina massiva $cnt i nomer stranitsy $pg kolkist storinok $pages startovy numer $start<br>";
     
if(($start+20)>$cnt){ 
    
	$start = $cnt - 20;
        
}
    
if($start < 0){
    
	$start = 0;
        
}
//выводим на экран 

$cnt_art = 0;

$lenght = count($store_arr);

$pos_adv = 0;

for($i=0;$i<4;$i++){
    
    ?>
   <div class = "stroka_vitriny">
       
<!--       строка витрины-->
       
       <?php

	for($ii=0;$ii<5;$ii++){
            
//           if($ii < 4){
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
            $num = rand(3, 6);
            $cirkles = $num."_circles.jpg";
            
             $name = iconv("UTF-8", "WINDOWS-1251", $name);
	
		$name = substr($name,0,42)."...";
                
                $name = iconv("WINDOWS-1251", "UTF-8", $name);
            
            if($pos_adv == 9){ ?>
                <div class="main_reklama">
                
        <?php 

            $str = get_Advert(200, 270, $advert_array,0);
            echo $str;

?>
    </div>
                
<?php            }else if($artikul_i){

           ?> 
                        <div class = "kard_vtrn">
				<div id = "img_vtrn">
                                    <form action="index.php?act=item_description" method="post">
                                    <input type="image" src="main/act_prewiew.php?src=<?php echo "http://$_SESSION[domen]";?>/images/goods/<?php echo $image;?>&amp;width=80&amp;height=185"/>

                                    <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
                                    <?php if(!isset ($_SESSION[auth]) or $_SESSION[auth]==0){?>
                                    <input type="hidden" name="cod" value="<?php echo $attributes[cod];?>"/>
                                    <?php }?>
                                    <input type="hidden" name="artikul" value="<?php echo $artikul_i;?>"/>
                                    </form>
                                </div>  
				<div id = "name_vtrn">
                                   <a href="index.php?act=item_description&artikul=<?php echo $artikul_i.$address;?>"><?php echo $name;?></a>
                                   <br/>
                                   
                                <div id = "opis_vtrn"><?php echo $stid;?></div>
				<div id = "obem_vtrn"><?php echo $volume;?> кг.</div>
				<div id = "prise_vtrn">Цена <?php echo $price;?></div>
                                </div>
				
<!--				<div id = "kruzki_vtrn">
                                    <img src="<?php echo "http://$_SESSION[domen]/images/storefront/$cirkles";?>" width="175" />
                                </div>-->
                            </div>
                 
         <?php       
}
              $start++; 

         $pos_adv++;      

	}
  
}
?> 
</div>   
   <?php if(1){ 
       
    } 

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
if(isset($attributes[reg]) && $attributes[reg] == 1){?>
<!--<script language="javascript">javascript:alert('Благодарим за покупку будем рады видеть снова!');</script>-->
<?php	}

   unset ($attributes[reg]);

 if(isset($attributes[affected]) && $attributes[affected] == 1){?>

<!-- <script language="javascript">javascript:alert('Товар добавлен в корзину!');</script>-->
 
  <?php } 
  
  unset($attributes[affected]);
  
}
?>

