
<!--content----------------------------------------------------------------------------- -->

	<div class="cont">
            
 <?php $artikul = $attributes[artikul];?>           
	
<!--left_side модуль изображения товара----------------------------------------------------------------------------- -->

		<div class="left_side">
                    <div id = "prewiev"> 

                        <form action="index.php?act=item_description" method="post">
                            <p align="center">
                             <?php if(isset ($attributes[cod])){ ?>
                                <input type="hidden" name="cod" values="<?php echo $attributes[cod];?>"/>
                            <?php  } ?>
                                <input type="hidden" name="artikul" value="<?php echo $attributes[artikul];?>"/>
                                <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
                                <input type="hidden" name="price_id" value="<?php echo $attributes[price_id];?>"/>
                                <input type="image" src="http://call-up.ru/images/storefront/back_btn.jpg" <?php echo $btn[status];?> />
                            </p>
                        </form>
                    </div>
                    <div id = "img_bg">
                        <img src="main/act_prewiew.php?src=http://call-up.ru/images/goods/<?php echo $item_img;?>&width=338&height=411"/>
                    </div>
                    <div id = "next">

                        <form action="index.php?act=item_description" method="post">
                            <p align="center">
                             <?php if(isset ($attributes[cod])){ ?>
                                <input type="hidden" name="cod" values="<?php echo $attributes[cod];?>"/>
                            <?php   } ?>
                                <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
                                <input type="hidden" name="artikul" value="<?php echo $attributes[artikul];?>"/>
                                <input type="hidden" name="img" value="<?php echo ($img + 1);?>"/>
                                <input type="hidden" name="price_id" value="<?php echo $attributes[price_id];?>"/>
                               <input type="image" src="http://call-up.ru/images/storefront/next_btn.jpg" <?php echo $btn[status];?>/>
                           </p>
                        </form>
                    </div>
<!--		<div class = "img_small">
                <?php // $str = get_Advert(469, 91, $advert_array,2); echo $str;?>
                </div>-->
		</div>
		
<!--center модуль описания товара сюда вставить даные о литраже
------------------------------------------------------------------------------->
<?php
$name_item = $name_artikul ->name;

if(strlen($name_item) > 42)$go=1;
?>
		<div class= "center_side">
			<div id = "name_center"><?php echo $name_item;?><br/><br/></div>
                        <div><p>&nbsp;<br/></p></div>
			<div id = "prise_txt">цена (руб):</div>
<!--			<div id = "obem_txt">объем:</div>-->
			<div id = "price_center"><?php echo $name_artikul->volume[0][num_price_single];?> р.</div> 
			
                        <div id = "obem_blok"> 
                            
                            <?php 
foreach ($name_artikul->volume as $value) {
    ?>
<!--   <div id="value"><p align="center" onclick="javascript:go_Artikul('<?php echo $value[str_code1];?>','<?php echo $attributes[price_id];?>','<?php echo $attributes[stid];?>','<?php echo $attributes[cod];?>');" onmouseover="this.style.color='#CCCCCC'" onmouseout="this.style.color='#BB0D72'"><?php if($artikul == $value[str_code1])echo "<strong>"; echo $value[str_volume];echo "<small>".$name_artikul->unit."</small>";  if($artikul == $value[str_code1])echo "</strong>";?></p></div>-->
<?php
}?>
             </div>
                         
                <!-- END -->
                <div id = "v_korzinu">
<!--                    <a class="to_cart" id="<?php echo $attributes[artikul];?>" name="<?php echo $attributes[cod];?>">В корзину</a>-->
                    <a id="to_cart" href="index.php?act=to_order&amp;stid=2&amp;artikul=<?php echo $attributes[artikul];?>&amp;pricelist_id=<?php echo $name_artikul->pricelist;?>&amp;amount=1&amp;type=1&cod=<?php echo $attributes[cod];?>&amp;up=1">В корзину</a>
                </div>
                <div id = "otlozit">
                    <a href="index.php?act=to_reserved&amp;stid=<?php echo $attributes[stid];?>&amp;artikul=<?php echo $attributes[artikul];?>&amp;pricelist_id=<?php echo $name_artikul->pricelist;?>&amp;amount=1&amp;type=1&amp;cod=<?php echo $attributes[cod];?>&amp;up=1">Отложить</a>
                </div>
			<div id = "opisanie_center">
                            <br/><br/>
                            <p class="description">Описание:</p>
                            <p class="description_2">
                    <?php 
			if(!$description[short_description]){
                            echo "Описание товара отсутствует.";	
                        }else{
                            echo $description[short_description];
                            ?>
                               <br/>
                               <a href='index.php?act=view_descr&amp;artikul=<?php echo $attributes[artikul];?>&amp;stid=<?php echo $attributes[stid];if(isset ($attributes[cod]))echo "&cod=".$attributes[cod];?>' target='_blank' style="font-family: Arial;font-size: 12px;color: #990033;" onmouseover="this.style.color='#878787'" onmouseout="this.style.color='#990033'" > &nbsp;Подробно...</a>
                                <?php 
                        }
                         ?>
                            </p>
                        </div>
                        
			<div id = "ingr_title">Ингридиенты:</div>
			<div id = "ingr_txt"><?php 
			if(!$description[ingridients]){
                            echo "Информация отсутствует.";	
                        }else{
                            echo $description[ingridients];
                        }

                    ?></div>
                        <div id = "vopros_txt">
                            <a href="http://<?php echo $description[gost];?>" target="_blank"><?php echo $description[gost];?></a>
                        </div>
		</div>
		
		
<!--right_side
------------------------------------------------------------------------------->
		<div class = "right_side">
                    
                    <div class="dscr_reklama">
                         <?php $str = get_Advert(182, 514, $advert_array,1); echo $str;?>
                    </div>
			                        
		</div>

		</div>
<!--<div class = "all_see">
    <p style="padding-top: 5px; margin-left: 36px;">Вместе с этим товаром смотрят:</p>
</div>-->
		
		
<!--Смотрят еще 
------------------------------------------------------------------------------->
	
<!--		<div class = "smotrjat_sche">
                    
                    <?php 
//                    $tmp_arr = array(); 
//                    print_r($rnd_arr);
//                    for($i=0;$i<5;$i++){
//                        $pos = rand(0,($count-1));
//                        array_push($tmp_arr, $rnd_arr[$pos]);
                                               
			?>
                   
                        <div class = "small_kard_2">
                            <div id = "imag_right" align="center">
                                <a href="index.php?act=item_description&amp;artikul=<?php echo $rnd_arr[$pos][str_code1];?>&amp;stid=<?php echo $attributes[stid]; echo $str_code;?>&amp;price_id=<?php echo $rnd_arr[$pos][price_id];?>"/>
                                <img src="main/act_prewiew.php?src=<?php echo "http://$_SESSION[domen]/images/goods/".$rnd_arr[$pos][id].".jpg";?>&amp;width=80&amp;height=185"  title="<?php echo $tmp_arr[$i][str_name];?>"/>
                                </a>
                            </div>
                        </div>
                    
                                          
                    
                   <?php // } ?>
                
 <div class = "smotrjat_sche_1">                 
                      <?php // 
                       
//                      for($i=0;$i<5;$i++){
                          
//                       $str_name = $tmp_arr[$i][str_name];
                       
//                       $str_name = iconv("UTF-8", "WINDOWS-1251", $str_name);
                       
//                       if(strlen($str_name) > 127)$str_name = substr($str_name, 0,128)."...";
                       
//                       $str_name = iconv("WINDOWS-1251", "UTF-8", $str_name);
                       
                        ?>
<div class = "small_kard_3"> 
                       <div id = "name_sk" align="justify">
                                <?php
                                
//                                echo $str_name; ?>
                        </div>

                        <div id = "obem_sk">
                        
                        </div>
                        <div id = "prise_sk">
                            
                        </div>
                        <div id = "kruzki_sk">
                        
                        </div>  
                   </div>   
                      <?php // }?> 
 </div>                 
</div> -->
<script type="application/javascript">

</script>