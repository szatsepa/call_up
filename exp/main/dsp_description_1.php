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
                             
                                <input type="hidden" name="artikul" value="<?php echo $attributes[artikul];?>"/>
                                <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
                                <input type="hidden" name="price_id" value="<?php echo $_SESSION[pid];?>"/>
<!--                                <input type="image" src="../images/storefront/back_btn.jpg" <?php echo $btn[status];?> />-->
                            </p>
                        </form>
                    </div>
                    <div id = "img_bg">
                        <input type="hidden" id="this_page" value="<?php echo $_SESSION[page];?>"/> 
                        <img src="main/act_prewiew.php?src=http://call-up.ru/images/goods/<?php echo $item_img;?>&width=338&height=411"/>
                    </div>
                    <div id = "next">

                        <form action="index.php?act=item_description" method="post">
                            <p align="center">
                             
                                <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
                                <input type="hidden" name="artikul" value="<?php echo $attributes[artikul];?>"/>
                                <input type="hidden" name="img" value="<?php echo ($img + 1);?>"/>
                                <input type="hidden" name="price_id" value="<?php echo $_SESSION[pid];?>"/>
<!--                               <input type="image" src="../images/storefront/next_btn.jpg" <?php echo $btn[status];?>/>-->
                           </p>
                        </form>
                    </div>
		</div>
		
<!--center модуль описания товара сюда вставить даные о литраже
------------------------------------------------------------------------------->
<?php
//$name_item = $name_artikul ->name;
//
//if(strlen($name_item) > 42)$go=1;
?>
		<div class= "center_side">
			<div id = "name_center"><br/><br/></div>
                        <div><p>&nbsp;<br/></p></div>
			<div id = "prise_txt"></div>
			<div id = "price_center"></div> 
			
                        <div id = "obem_blok"> 
 
             </div>
                         
                <!-- END -->
                <div id = "v_korzinu">
                    <input type="hidden" id="artikul" value="<?php echo $attributes[artikul];?>"/> 
                    <a class="to_cart" id="add_to_cart">Добавить в билет</a>
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
                        
                <div id = "ingr_title"><p id="your_mind">Информация к размышлению:</p></div>
			<div id = "ingr_txt"><?php 
			if(!$description[ingridients]){
                            echo "<br/>Информация отсутствует.";	
                        }else{
                            echo "<br/>".$description[ingridients];
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
		<div class = "smotrjat_sche">
                   
                        <div class = "small_kard_2" id ="favors">
                            <div class="imag_right" style="left: 0px;">
                                <div>
                                    <img class="favorites_point" id="0" src="" alt="" width="98" height="98"/>
                                </div>
                                <div class="favor" id="f_0"></div>
                                    
                             </div>
                            <div class="imag_right" style="left: 132px;">
                                <div>
                                    <img class="favorites_point" id="1" src="" alt="" width="98" height="98"/>
                                </div>
                                <div class="favor" id="f_1"></div>
                                    
                             </div>
                            <div class="imag_right" style="left: 264px;">
                                <div>
                                    <img class="favorites_point" id="2" src="" alt="" width="98" height="98"/>
                                </div>
                                <div class="favor" id="f_2"></div>
                                    
                             </div>
                            <div class="imag_right" style="left: 396px;">
                                <div>
                                    <img class="favorites_point" id="3" src="" alt="" width="98" height="98"/>
                                </div>
                                <div class="favor" id="f_3"></div>
                                    
                             </div>
                            <div class="imag_right" style="left: 528px;">
                                <div>
                                    <img class="favorites_point" id="4" src="" alt="" width="98" height="98"/>
                                </div>
                                <div class="favor" id="f_4"></div>
                                    
                             </div>
                            <div class="imag_right" style="left: 660px;">  
                                <div>
                                    <img class="favorites_point" id="5" src="" alt="" width="98" height="98"/>
                                </div>
                                <div class="favor" id="f_5"></div>
                                    
                             </div>
                        </div>   
    <div class = "all_see" id="see_all" style="visibility: hidden;"> 
    <p style="padding-top: 5px; margin-left: 36px;"><strong>Фавориты лотереи:</strong></p>
</div>                            
                            

</div>                   
 
