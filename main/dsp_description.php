<?php 
include ("act_parse_md5.php");

include ("qry_good_img.php");

$row = mysql_fetch_row($qry_company);

$company_id = $row[0];

$art_arr = good_image($attributes[artikul]);

$description = good_description($attributes[artikul]);


$beside_arr = goods_list($attributes[pricelist_id], $attributes[artikul]);

//$rnd_arr = array();$beside_arr = array();
$rnd_arr = goods_rnd($attributes[pricelist_id], $attributes[artikul]);
$count = count($rnd_arr);

$count_in_cart = count_cart($attributes[user_id],$attributes[pricelist_id]);

?>
<div class="wrapper">
<div style="position:relative; top:0px; left:0px;">
<!-- header -->
	<div style="position:fixed; top:15px; left:10px;">
			<img src="/images/storefront/H_<?php echo $company_id;?>.jpg" width="819" height="120" alt="H_BG">	
	</div>
	<div style="position:fixed; top:15px; left:829px;">
		<div style="">
			<img src="/images/storefront/HR_1_<?php echo $company_id;?>.jpg" alt="HR_1_<?php echo $company_id;?>.jpg" width="206" height="31">		
		</div>
		<div style="">
		    <img src="/images/storefront/HR_2_<?php echo $company_id;?>.jpg" width="206" height="26" alt="HR_2">
		</div>
		 <div style="">
			<!-- <img src="/images/storefront/HR_3_<?php echo $company_id;?>.jpg" width="206" height="40" alt="HR_3">  -->
			<p><font size="3" face="sans-serif">Способ оплаты | Доставка</font></p>
		</div>

		<div>
                    <p align="center"><form  action="index.php?act=step1&amp;pricelist_id=<?php echo $attributes[pricelist_id].$urladd; ?>" method="post">
			<font size="3" color="white" face="sans-serif"></font>
                        <input type="hidden" name="type" value="0"/>
                        <input type="submit" name="cart" value='&nbsp;&nbsp;В корзине:<?php echo $count_in_cart;?> товаров.&nbsp;&nbsp;'/>
                    </form></p>
		</div>
	</div>
<!-- end header -->	
<!-- body page -->
<div style="position:fixed; top:136px; left:10px;">
	<img src="/images/storefront/HB_<?php echo $company_id;?>.jpg" alt="HB_46000.jpg" width="1025" height="37">		
</div>

<div style="position:fixed; top:173px; left:10px;">
	<img src="/images/goods/<?php echo $art_arr[id];?>.jpg"  alt="Artikul" width="446" height="446">		
</div>
	
		
	<div style="position:fixed; top:173px; left:506px;">
		<div>
			<h3><p><?php echo $art_arr[str_name];?></p></h3>
		</div>
		<div>
			<h4><p><?php echo $art_arr[comment];?></p></h4>
		</div>
		<div>
			<h4><p>Артикул:<?php echo $attributes[artikul];?></p></h4>
		</div>
		<div>
			<h4><p>Получить скидку?</p></h4>
		</div>
		<div>
			<img src="/images/storefront/stars.jpg" width="328" height="17" alt="stars">	
		</div>
		<div>
			<p>Цена:</p>
		</div>
		<div>
			<p>объем:</p>
		</div>
		<div>
			<p><?php echo $art_arr[num_price_single];?></p>
		</div>
		<div>
			<p><?php echo $art_arr[str_volume];?></p>
		</div>
		<div>
			<p><form action="http://www.call-up.ru/index.php?act=customer&action=add_cart" method="post">
			<input type="hidden"  name="amount" value="1">
			<input type="hidden"  name="cod" value="<?php echo $attributes[cod];?>">
			<input type="hidden"  name="artikul" value="<?php echo $attributes[artikul];?>">
			<input type="hidden"  name="pricelist_id" value="<?php echo $attributes[pricelist_id];?>">
			<input type="hidden"  name="discount" value="0">
                        <input type="image" src="/images/storefront/add_cart.jpg" width="166" alt="в корзину" name="submit">
			</form></p>
		</div>
		<div>
			<p><form action="" method="post">
			
		<input type="image" src="/images/storefront/deferred.jpg" width="166" alt="отложить" name="submit">
			</form></p>
		</div>
		<div>
			<p><?php 
			if($description == 0){
			echo "Описания товара отсутствует.";	
	}else{
			echo $description[short_description];
	}

		?></p>
		</div>
		<div>
			<p>Ингридиенты:<br><?php 
			if($description == 0){
			echo "Информация отсутствует.";	
	}else{
			echo $description[short_description];
	}

		?></p>
		</div>
		<div>
			<p><h3>Задать вопрос?<br></h3>Задайте вопрос и наш специалист<br>ответит в течении пяти<br>минут или раньше.</p>
		</div>
	</div>
		
		
	<div style="position:fixed; top:615px; left:5px;">

	 <?php

	 $step = 110;
	 $position = 5;

			for($i=0;$i<4;$i++){
					echo '<div style="position:fixed; top:615px; left:'.($position + $step*$i).'px; ">
			<img src="/images/goods/'.$beside_arr[$i][id].'.jpg" alt="'.$beside_arr[$i][id].'" width="110" ></div>';
				}
?>

</div>

<div style="position:fixed; top:173px; left:830px;">

<?php 

for($i = 0;$i < 2;$i++){

	$right_id = rand(0,($count-1));

		echo '<div style="position:fixed; top:'.(173+430*$i).'px; left:830px;">
		<div>
			<img src="/images/goods/'.$rnd_arr[$right_id][id].'.jpg" alt="" width="194">		
		</div>
		<div>
		  <h5><p>'.$art_arr[str_name].'</p></h5><br>
		  <p>'.$art_arr[comment].'.</p><br>
		  <p>'.$art_arr[num_price_single].'</p>
		</div>
		<div>
			<img src="/images/storefront/circles.jpg" width="202" height="47" alt="">		
		</div>';
}

?>

</div>
			
			
	<div style="position:fixed; top:750px; left:10px; ">
			<h3><p>Вместе с этим товаром смотрят:</p></h3>
	</div>
		
	
	
	<div  style="position:fixed; top:793px; left:10px;">
<?php 

	for($i = 0;$i < 4;$i++){

		echo '<div style="position:fixed; top:793px; left:'.(5+205*$i).'px;">
			<img src="/images/goods/'.$rnd_arr[rand(0,($count-1))][id].'.jpg" alt="'.$rnd_arr[rand(0,($count-1))][id].'.jpg" width="165" class="image_small">		
		</div>';

	}

	?>

	</div>
		
		

</div>
</div>
	<div style="position:fixed; top:1065px; left:10px;">
			<img src="/images/storefront/F_<?php echo $company_id;?>.jpg" alt="F_<?php echo $company_id;?>.jpg" width="1025" height="171">		
	</div>

</div></body>
</html>