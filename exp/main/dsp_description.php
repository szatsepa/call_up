<script type="text/javascript">
    var pid = <?php echo $_SESSION[pid];?>; 
</script>
<!--content----------------------------------------------------------------------------- -->

	<div class="cont">
            
 <?php
     $artikul = $attributes[artikul];
     $item_id = "&art=".$attributes[art];
 
 ?>           
	
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
		</div>
		
<!--center модуль описания товара сюда вставить даные о литраже
------------------------------------------------------------------------------->
<?php
$name_item = $name_artikul ->name;

if(strlen($name_item) > 42)$go=1;
?>
		<div class= "center_side">
			<div id = "name_center"><br/><br/></div>
                        <div><p>&nbsp;<br/></p></div>
			<div id = "prise_txt">цена (руб):</div>
			<div id = "price_center"><?php echo $name_artikul->volume[0][num_price_single];?> р.</div> 
			
                        <div id = "obem_blok"> 
 
             </div>
                         
                <!-- END -->
                <div id = "v_korzinu">
                    <a class="to_cart" id="add_cart" name="<?php echo $attributes[artikul];?>">В корзину</a>
<!--                    <a id="to_cart" href="index.php?act=to_order&amp;stid=2&amp;artikul=<?php echo $attributes[artikul];?>&amp;pricelist_id=<?php echo $name_artikul->pricelist;?>&amp;amount=1&amp;type=1&cod=<?php echo $attributes[cod];?>&amp;up=1<?php echo $item_id;?>">В корзину</a>-->
                </div>
                <div id = "otlozit">
                    
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

		
<div class = "all_see" id="see_all"> 
    <p style="padding-top: 5px; margin-left: 36px;"><strong>Фавориты лотереи:</strong></p>
</div>
</div> 	
		<div class = "smotrjat_sche">
                   
                        <div class = "small_kard_2" id ="favors">
                            
                        </div>

</div>                   
 
