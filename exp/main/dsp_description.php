<!--content----------------------------------------------------------------------------- -->

	<div class="cont">
<input type="hidden" id="idc" value="<?php echo $attributes[idc];?>"/>            
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
			<div id = "v_korzinu">
                            <input type="hidden" id="artikul" value="<?php echo $attributes[artikul];?>"/> 
                            <a class="to_cart" id="add_to_cart">Добавить в билет</a>
                            <br/>
                        </div> 
                        <div id = "price_center"></div> 
                
                
			<div id = "opisanie_center">
                            <br/>
                            <p class="description">Описание:</p>
                            <p class="description_2">Описание товара отсутствует.</p>
                        </div>
                        
                <div id = "ingr_title"><p id="your_mind">Информация к размышлению:</p></div>
			<div id = "ingr_txt"><?php 
			if(!$description[ingridients]){
                            echo "<br/>Информация отсутствует.";	
                        }else{
                            echo "<br/>".$description[ingridients];
                        }

                    ?>
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
                            
                        </div>
                    
<div class = "all_see" id="see_all">   
    <p style="padding-top: 5px; margin-left: 16px;text-align: left;">Фавориты лотереи:</p>
</div>
</div>                   
 
