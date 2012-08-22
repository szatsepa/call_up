
	
<div class = "stroka_zakaza">
		<div class =  "img_tovar_chk">
                    <div id = "name_tovara_chk"><p align="center"><strong><?php echo $status;?></strong></p></div>
			<div id = "img_to_chk">
                            <img src="main/act_prewiew.php?src=http://<?php echo $_SESSION[domen];?>/images/goods/<?php echo $img; ?>.jpg&width=120&height=160"alt="Images"/>
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
                     
                              if($count_volume>1 && $list_volume[$posart + 1][str_code1]){ 
                                
//                                 if(!$list_volume[$posart + 1][str_code1]){$dis = "disabled";
                                  ?>
                                    
                                   
                                    <form action="index.php?act=change_volume" method="post">
                                        <p align="center">
<!--                                            <input type="image" src="<?php echo "http://$_SESSION[domen]";?>/images/storefront/btn_up.gif" alt="Изменить." name="submit" value="val" style="vertical-align: middle" <?php //echo $dis;?>/></p>-->
                                            <input type="hidden" name="name" value="<?php echo $name;?>"/>                                        
                                            <?php if(isset ($attributes[cod])){ ?> <input type="hidden" name="cod" value="<?php echo $attributes[cod]; ?>"/><?php } ?>                                        
                                            <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
                                            <input type="hidden" name="value" value="<?php echo $volume;?>"/>
                                            <input type="hidden" name="art_n" value="<?php echo $list_volume[$posart + 1][str_code1];?>"/>
                                            <input type="hidden" name="art_o" value="<?php echo $artikul;?>"/>
                                            <input type="hidden" name="price_id" value="<?php echo $price_id;?>"/>
                                            <input type="hidden" name="type" value="1"/>
                                            <input type="hidden" name="where" value="<?php echo $str_act;?>"/>
                                    </form>
                                    <?php
                                    
                                    $dis = ''; }else{?>
<!--                                    <p align="center"><img  src="<?php echo "http://$_SESSION[domen]";?>/images/storefront/btn_up.gif" alt="Изменить." /></p>-->
                                    <?php }?>
                                </div>
<!--				<div id = "vid_chk"><p class="cng_volume"><?php echo $volume;?> кг. </p></div>-->
				<div id = "up_vid_chk">
                                     <?php if($count_volume>1  && $list_volume[$posart - 1][str_code1]){ 
     
//                                         if(!$list_volume[$posart - 1][str_code1]) $dis = "disabled";
                                         
                                         ?>
                                    <form action="index.php?act=change_volume" method="post">
                                        <p align="center">
<!--                                             <input type="image" src="<?php echo "http://$_SESSION[domen]";?>/images/storefront/btn_down.gif" alt="Удалить" name="submit" value="val" style="vertical-align: middle" <?php //echo $dis;?>/>-->
                                            <input type="hidden" name="name" value="<?php echo $name;?>"/>
                                            <?php if(isset ($attributes[cod])){ ?> <input type="hidden" name="cod" value="<?php echo $attributes[cod]; ?>"/><?php } ?>
                                            <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
                                            <input type="hidden" name="value" value="<?php echo $volume;?>"/>
                                            <input type="hidden" name="art_n" value="<?php echo $list_volume[$posart - 1][str_code1];?>"/>
                                            <input type="hidden" name="art_o" value="<?php echo $artikul;?>"/>
                                            <input type="hidden" name="price_id" value="<?php echo $price_id;?>"/>
                                            <input type="hidden" name="type" value="0"/>
                                            <input type="hidden" name="where" value="<?php echo $str_act;?>"/>
                                        </p>
                                    </form>
                                    <?php $dis = "";}else{?>
<!--                                    <p align="center"><img src="<?php echo "http://$_SESSION[domen]";?>/images/storefront/btn_down.gif" alt="Добвить" /></p>-->
                                    <?php }?>
                                </div>
			</div>
		</div>
		<div class = "kol_tovara_chk">
		
			<div id = "kontejner_kol_chk">
				<div id = "up_kol_chk">
                                    <form action="index.php?act=<?php echo $str_act;?>" method="post">
                                        <p align="center">
                                            <input type="hidden"  name="artikul" value="<?php echo $artikul;?>"/>
                                            <input type="hidden"  name="pricelist_id" value="<?php echo $price_id;?>"/>
                                            <input type="hidden" name="cod" value="<?php echo $attributes[cod]; ?>"/>
                                            <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
                                            <input type="hidden"  name="discount" value="0"/>
                                            <input type="hidden"  name="up" value="1"/>
                                            <input type="hidden"  name="amount" value="1"/>
                                            <input type="hidden"  name="type" value="2"/>
<!--                                            <input type="image" src="<?php echo "http://$_SESSION[domen]";?>/images/storefront/btn_up.gif" alt="Добвить" name="submit0" value="val" style="vertical-align: middle"/>-->
                                        </p>
                                    </form>
                                </div>
<!--				<div id = "kol_chk"><p class="cng_volume"><?php echo $amount;?> шт.</p></div>-->
				<div id = "up_kol_chk">
                                    <form action="index.php?act=<?php echo $str_act;?>" method="post">
                                        <p align="center">
                                            <input type="hidden"  name="artikul" value="<?php echo $artikul;?>"/>
                                            <input type="hidden"  name="pricelist_id" value="<?php echo $price_id;?>"/>
                                            <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
                                            <input type="hidden"  name="discount" value="0"/>
                                            <input type="hidden"  name="amount" value="1"/>
                                            <input type="hidden"  name="down" value="1"/>
                                            <input type="hidden"  name="type" value="2"/>
                                            <input type="hidden"  name="cod" value="<?php echo $attributes[cod];?>"/>
<!--                                            <input type="image" src="<?php echo "http://$_SESSION[domen]";?>/images/storefront/btn_down.gif" alt="Удалить" name="submit1" value="val" style="vertical-align: middle"/>-->
                                        </p>
                                    </form>
                                </div>
			</div>
		</div>
		<div class = "cena_chk">
                    <div class="sum_pos">
<!--                        <p> 
                                            <?php $all_cost += ($amount*$price); echo ($amount*$price);?> 
                        </p>-->
<?php 
                        $str = "act=del_item&artikul=$artikul&stid=$attributes[stid]&type=$type";
                        
                        if(!isset ($_SESSION[auth]) or $_SESSION[auth] == 0){
                           
                            $str = $str."&cod=".$attributes[cod];
                        }
                        
                        ?>
<div style="font: 22px Arial;color: #330000;text-align: center;">
<!--    <a href="index.php?<?php echo $str;?>">Удалить</a>--> 
</div>
                    </div>
		</div>
    <div class="img_tovar_chk">
        <?php 
        if($num == 1){ 
            
            $str = get_Advert(175, 247, $advert_array,4);
            
            echo $str;
        } ?>
    </div>
	</div> 
            
	