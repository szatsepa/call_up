<!--content
------------------------------------------------------------------------------->
	<div class="cont">
	
<!--left_side модуль изображения товара
------------------------------------------------------------------------------->
		<div class="left_side">
                    <div id = "prewiev">
<?php
$aid = $name_artikul ->volume[0][id];
$btn = contrlStep($aid,(-1),$index_arr);

  if(isset ($attributes[cod])) $str_code = "&amp;cod=$attributes[cod]";
  ?>
                        <form action="index.php?act=item_description" method="post">
                            <p align="center">
                             <?php if(isset ($attributes[cod])){ ?>
                                <input type="hidden" name="cod" values="<?php echo $attributes[cod];?>"/>
                            <?php  } ?>
                                <input type="hidden" name="artikul" value="<?php echo $btn[artikul];?>"/>
                                <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
                                <input type="hidden" name="goods_id" value="<?php echo $btn[id];?>"/>
                                 <?php if(!isset ($btn[status])) { ?>  
                                <input type="image" src="http://<?php echo $_SESSION[domen];?>/images/storefront/back_btn.jpg" <?php echo $btn[status];?> />
                             <?php }else{ ?>
                                <img src="http://<?php echo $_SESSION[domen];?>/images/storefront/back_btn.jpg" alt="<<"/>
                                <?php } ?>
                            </p>
                        </form>
                    </div>
                    <div id = "img_bg">
                        <img src="main/act_prewiew.php?src=http://<?php echo $_SESSION[domen];?>/images/goods/<?php echo $art_arr[id];?>.jpg&amp;width=338&amp;height=411"/>
                    </div>
                    <div id = "next">
<?php
$aid = $name_artikul ->volume[0][id];
$btn = contrlStep($aid,1,$index_arr);

?>
                        <form action="index.php?act=item_description" method="post">
                            <p align="center">
                             <?php if(isset ($attributes[cod])){ ?>
                                <input type="hidden" name="cod" values="<?php echo $attributes[cod];?>"/>
                            <?php   } ?>
                                <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
                                <input type="hidden" name="artikul" value="<?php echo $btn[artikul];?>"/>
                                <input type="hidden" name="goods_id" value="<?php echo $btn[id];?>"/>
                             <?php if(!isset ($btn[status])) { ?>  
                                <input type="image" src="http://<?php echo $_SESSION[domen];?>/images/storefront/next_btn.jpg" <?php echo $btn[status];?>/>
                            <?php }else{ ?>
                                <img src="http://<?php echo $_SESSION[domen];?>/images/storefront/next_btn.jpg" alt=">>"/>
                                <?php } ?>
                            </p>
                        </form>
                    </div>
		<div class = "img_small">
                    <?php for($i=0;$i<4;$i++){
                         $pos = rand(0,($count-1));
                         ?>
			<div id = "img_small_small_1">
                            <a href="index.php?act=item_description&amp;artikul=<?php echo $rnd_arr[$pos][str_code1];?>&amp;stid=<?php echo $attributes[stid]; echo $str_code;?>"/>
                            <img src="main/act_prewiew.php?src=http://<?php echo $_SESSION[domen];?>/images/goods/<?php echo$rnd_arr[$pos][id];?>.jpg&amp;width=56&amp;height=125" title="<?php echo $rnd_arr[$pos][str_name];?>"/>
                             </a></div>
               <?php     }?>
		</div>
		</div>
		
<!--center модуль описания товара сюда вставить даные о литраже
------------------------------------------------------------------------------->

		<div class= "center_side">
			<div id = "name_center"><?php echo $name_artikul ->name;?></div>
			<div id = "krat_opis"><?php echo $name_artikul ->p_name;?></div>
			<div id = "artikul_center">Артикул: <?php echo $name_artikul ->volume[0][str_code1];?></div>
<!--			<div id = "skidka_center">Получить скидку?</div>-->
			<div id = "stars"><img src="http://<?php echo $_SESSION[domen];?>/images/storefront/stars.jpg"/></div>
			<div id = "prise_txt">цена (руб):</div>
			<div id = "obem_txt">объем:</div>
			<div id = "price_center"><?php echo $name_artikul->volume[0][num_price_single];?> р.</div>
			
                        <div id = "obem_blok">
                            <div style="position: relative;float: left;width: 37px;height: 26px;"><p align="center"><?php echo $name_artikul->volume[0][str_volume];?></p></div>
				<div style="position: relative;float: left;width: 37px;height: 26px;"><p align="center"><?php echo $name_artikul->volume[1][str_volume];?></p></div>
				<div style="position: relative;float: left;width: 37px;height: 26px;"><p align="center"><?php echo $name_artikul->volume[2][str_volume];?></p></div>
			</div>
                <!-- END -->
                <div id = "v_korzinu">
                    <a href="index.php?act=to_order&amp;stid=<?php echo $attributes[stid];?>&amp;artikul=<?php echo $attributes[artikul];?>&amp;pricelist_id=<?php echo $name_artikul->pricelist;?>&amp;amount=1&amp;type=1&cod=<?php echo $attributes[cod];?>&amp;up=1">В корзину</a>
                </div>
                <div id = "otlozit">
                    <a href="index.php?act=to_reserved&amp;stid=<?php echo $attributes[stid];?>&amp;artikul=<?php echo $attributes[artikul];?>&amp;pricelist_id=<?php echo $name_artikul->pricelist;?>&amp;amount=1&amp;type=1&amp;cod=<?php echo $attributes[cod];?>&amp;up=1">Отложить</a>
                </div>
			<div id = "opisanie_center">
                            <p class="description">Описание:</p>
                            <p class="description_2">
                    <?php 
			if(!$description[short_description]){
                            echo "Описание товара отсутствует.";	
                        }else{
                            echo $description[short_description];
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
                        <div id = "vopros_title">&nbsp;</div>
                        <div id = "vopros_txt">&nbsp;</div>
		</div>
		
		
<!--right_side
------------------------------------------------------------------------------->
		<div class = "right_side">
			
                            <?php 
                            
                          
                            
                            for($i=0;$i<2;$i++){
                              $num = rand(3, 6);
                              $cirkles = $num."_circles.jpg";  
                              $pos = rand(0,($count-1));
                              
                              $name_right = $rnd_arr[$pos][str_name]; 
                              
                              if(iconv_strlen($name_right)>22) $name_right = substr($name_right, 0, 22);
                              
				echo '<div class = "small_kard_1">
                                 <div id = "imag_right">
                                 <a href="index.php?act=item_description&amp;artikul='.$rnd_arr[$pos][str_code1].'&amp;stid='.$attributes[stid].$str_code.'">
                                 <img src="main/act_prewiew.php?src=http://'.$_SESSION[domen].'/images/goods/'.$rnd_arr[$pos][id].'.jpg&amp;width=80&amp;height=185" title="'.$rnd_arr[$pos][str_name].'" /></a></div>
				<div id = "name_sk">'.$rnd_arr[$pos][str_name].'</div>
				
				<div id = "obem_sk">  </div>
				<div id = "prise_sk"></div>
				<div id = "kruzki_sk"><img src="http://'.$_SESSION[domen].'/images/storefront/'.$cirkles.'" width="175" /></div>
                           </div>';
                              
                           }
                            ?>
                        
		</div>
		
<!--'.$rnd_arr[$pos][str_volume].'	Цена  р.'.$rnd_arr[$pos][num_price_single].'	-->
<!--Вместе с этими товарами смотрят еще
------------------------------------------------------------------------------->
		</div>
<div class = "all_see">
    <p style="padding-top: 5px; margin-left: 36px;">Вместе с этим товаром смотрят:</p>
</div>
		
		
<!--Смотрят еще 
------------------------------------------------------------------------------->
	
		<div class = "smotrjat_sche">
                    
                    <?php 
                    $tmp_arr = array();
                    
                    for($i=0;$i<5;$i++){
                        $pos = rand(0,($count-1));
                        array_push($tmp_arr, $rnd_arr[$pos]);
                                               
			?>
                        <div class = "small_kard_2">
                            <div id = "imag_right">
                                <a href="index.php?act=item_description&amp;artikul=<?php echo $rnd_arr[$pos][str_code1];?>&amp;stid=<?php echo $attributes[stid]; echo $str_code;?>"/>
                                <img src="main/act_prewiew.php?src=<?php echo "http://$_SESSION[domen]/images/goods/".$rnd_arr[$pos][id].".jpg";?>&amp;width=80&amp;height=185"  title="<?php echo $tmp_arr[$i][str_name];?>"/>
                                </a>
                            </div>
                        </div>
                    
                                          
                    
                   <?php } ?>
                
 <div class = "smotrjat_sche_1">                 
                      <?php 
                      
                      for($i=0;$i<5;$i++){
                          $art_name = $tmp_arr[$i][str_name];
                          if(iconv_strlen($art_name)>22) $art_name = substr ($art_name, 0, 22);
                          $num = rand(3, 6);
                          $cirkles = $num."_circles.jpg";
                          ?>
<div class = "small_kard_3"> 
                       <div id = "name_sk">
                                <?php
                                
                                echo $tmp_arr[$i][str_name]; ?>
                        </div>

                        <div id = "obem_sk">
                               <?php //echo $tmp_arr[$i][str_volume];?>  
                        </div>
                        <div id = "prise_sk">
<!--                            Цена <?php //echo $tmp_arr[$i][num_price_single];?> p.-->
                        </div>
                        <div id = "kruzki_sk">
                            <img src="<?php echo "http://$_SESSION[domen]/images/storefront/$cirkles";?>"/>
                        </div>  
                   </div>   
                      <?php }?> 
 </div>                 
</div>  	