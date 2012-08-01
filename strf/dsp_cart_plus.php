
	
<div class = "stroka_zakaza">
		<div class =  "img_tovar_chk">
			<div id = "img_to_chk">
                            <img src="main/act_prewiew.php?src=http://<?php echo $_SESSION[domen];?>/images/goods/<?php echo $img; ?>.jpg&amp;width=120&amp;height=160"alt="Images"/>
                        </div>
			<div id = "name_tovara_chk"><?php echo $name;?></div>
			<div id = "krat_opis_chk"><?php echo $comment;?></div>
			<div id = "cena_chk"><?php echo $price;?> р.</div>
		</div>
		
		<div class = "vid_tovara_chk">
			<div id = "kontejner_vid_chk">
				<div id = "up_vid_chk">
                     <?php
                     
                     if(isset ($_SESSION[user]))$user_id = $_SESSION[user]->data[id];
                     
                              if($count_volume>1){?>
                                    <form action="index.php?act=change_volume" method="post">
                                         <p align="center"><input type="image" src="<?php echo "http://$_SESSION[domen]";?>/images/storefront/btn_up.gif" alt="Добвить" name="submit" value="val" style="vertical-align: middle"/></p>
                                        <input type="hidden" name="name" value="<?php echo $name;?>"/>
                                        <input type="hidden" name="cod" value="<?php echo $attributes[cod]; ?>"/>
                                        <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
                                        <input type="hidden" name="value" value="<?php echo $value;?>"/>
                                        <input type="hidden" name="art" value="<?php echo $artikul;?>"/>
                                        <input type="hidden" name="price_id" value="<?php echo $_SESSION[price_id];?>"/>
                                        <input type="hidden" name="type" value="1"/>
<!--                                        <input type="hidden" name="up" value="1"/>-->
                                    </form>
                                    <?php }else{?>
                                    <p align="center"><img  src="<?php echo "http://$_SESSION[domen]";?>/images/storefront/btn_up.gif" alt="Добвить" /></p>
                                    <?php }?>
                                </div>
				<div id = "vid_chk"><p class="cng_volume"><?php echo $volume;?> кг. </p></div>
				<div id = "up_vid_chk">
                                     <?php if($count_volume>1){?>
                                    <form action="index.php?act=change_volume" method="post">
                                        <p align="center">
                                             <input type="image" src="<?php echo "http://$_SESSION[domen]";?>/images/storefront/btn_down.gif" alt="Удалить" name="submit" value="val" style="vertical-align: middle"/>
                                            <input type="hidden" name="name" value="<?php echo $name;?>"/>
                                            <input type="hidden" name="cod" value="<?php echo $attributes[cod]; ?>"/>
                                            <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
                                            <input type="hidden" name="value" value="<?php echo $value;?>"/>
                                            <input type="hidden" name="art" value="<?php echo $artikul;?>"/>
                                            <input type="hidden" name="price_id" value="<?php echo $_SESSION[price_id];?>"/>
                                            <input type="hidden" name="type" value="0"/>
<!--                                            <input type="hidden" name="down" value="1"/>-->
                                        </p>
                                    </form>
                                    <?php }else{?>
                                    <p align="center"><img src="<?php echo "http://$_SESSION[domen]";?>/images/storefront/btn_down.gif" alt="Добвить" /></p>
                                    <?php }?>
                                </div>
			</div>
		</div>
		<div class = "kol_tovara_chk">
		
			<div id = "kontejner_kol_chk">
				<div id = "up_kol_chk">
                                    <form action="index.php?act=to_order" method="post">
                                        <p align="center">
                                            <input type="hidden"  name="artikul" value="<?php echo $artikul;?>"/>
                                            <input type="hidden"  name="pricelist_id" value="<?php echo $_SESSION[price_id];?>"/>
                                            <input type="hidden" name="cod" value="<?php echo $attributes[cod]; ?>"/>
                                            <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
                                            <input type="hidden"  name="discount" value="0"/>
                                            <input type="hidden"  name="up" value="1"/>
                                            <input type="hidden"  name="amount" value="1"/>
                                            <input type="hidden"  name="type" value="2"/>
                                            <input type="image" src="<?php echo "http://$_SESSION[domen]";?>/images/storefront/btn_up.gif" alt="Добвить" name="submit0" value="val" style="vertical-align: middle"/>
                                        </p>
                                    </form>
                                </div>
				<div id = "kol_chk"><p class="cng_volume"><?php echo $amount;?> шт.</p></div>
				<div id = "up_kol_chk">
                                    <form action="index.php?act=to_order" method="post">
                                        <p align="center">
                                            <input type="hidden"  name="artikul" value="<?php echo $artikul;?>"/>
                                            <input type="hidden"  name="pricelist_id" value="<?php echo $_SESSION[price_id];?>"/>
                                            <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
                                            <input type="hidden"  name="discount" value="0"/>
                                            <input type="hidden"  name="amount" value="1"/>
                                            <input type="hidden"  name="down" value="1"/>
                                            <input type="hidden"  name="type" value="2"/>
                                            <input type="hidden"  name="cod" value="<?php echo $attributes[cod];?>"/>
                                            <input type="image" src="<?php echo "http://$_SESSION[domen]";?>/images/storefront/btn_down.gif" alt="Удалить" name="submit1" value="val" style="vertical-align: middle"/>
                                        </p>
                                    </form>
                                </div>
			</div>
		</div>
		<div class = "cena_chk">
<!--         style="top:40px;outline: 1px solid green;position: relative;"           id = "kol_chk"-->
                    <div class="sum_pos">
<!--                        <p class="vsego">Всего:</p>-->
                         <p> <?php $all_cost += ($amount*$price); echo ($amount*$price);?> р.
                        </p>
                    </div>
		</div>
	</div>
            
	 <div class = "oplatit_chk">
                                  
             <div id = "konteiner_orlatit_chk">
                 
   <?php if($key == (count($cart_list_arr))-1){}?> 
                 
                 <div id = "summa_chk">
 <?php if($key == (count($cart_list_arr))-1) echo "<p> Итого: $all_cost р. </p>";?>  
                 </div>
                <div id = "btn_oplatit_chk">                  
<?php if(!isset ($_SESSION[user]) && $key == (count($cart_list_arr))-1) echo "<a href='index.php?act=regs&amp;stid=$attributes[stid]&amp;price_id=$price_id&amp;cod=$attributes[cod]'>Заказать.</a>";?>                
<?php if(isset ($_SESSION[user]) && $key == (count($cart_list_arr))-1) echo "<a href='index.php?act=advance&amp;stid=$attributes[stid]&amp;price_id=$price_id'>Заказать.</a>";?>                  
                </div>
             </div>
             
             </div>