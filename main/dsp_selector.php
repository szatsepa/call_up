<?php 

// Панель выбора параметров для отображения прайса


$act_select = 'single_price';

// Текущая выбранная группа
$current_group = '';

// Сделаем поправку для страницы редактирования
if ($attributes[act] == 'edit_price') $act_select = 'edit_price';

?><div class="selector">&nbsp;<?php 
if ($attributes[act] == 'add_cart' or $attributes[act] == 'single_price' or $attributes[act] == 'add_favprice' or $attributes[act] == 'edit_price'){?><span class="selector"><form action="index.php?act=<?php echo $act_select; ?>&amp;pricelist_id=<?php echo $attributes[pricelist_id].$urladd; ?>" method="post"><select name="border"><option value="">Выбор по остатку</option><option value="max" <?php if (isset($attributes[border]) and $attributes[border] == 'max') echo "selected"; ?>>Макс. остаток</option><option value="min" <?php if (isset($attributes[border]) and $attributes[border] == 'min') echo "selected"; ?>>Мин. остаток</option></select><input type='submit' value='&gt;&gt;' class='submit'></form></span><span class="selector"><form action="index.php?act=<?php echo $act_select; ?>&amp;pricelist_id=<?php echo $attributes[pricelist_id].$urladd; ?>" method="post"><select name="group" id="group"><option value="">Выбор по группе</option><?php
		$num_group	=	mysql_numrows($qry_group);
		$counter = 0;
		//$silver = "style='background-color:ThreedFace;'";
		while ($counter < $num_group) {
			$dat = mysql_result($qry_group,$counter,$str_group);
			$selected = '';
			if (isset($attributes[group]) and $attributes[group] == quote_smart($dat)){
				
				$selected = 'selected';
				$current_group = $dat;
			
			}
            
            // Подрежем названия групп для селектора
            $show_dat = $dat;
            $output_lengts = 40;
            if ($mobile == 'true') $output_lengts = 20;              
            if (strlen($show_dat) > $output_lengts) {
                $show_dat = substr($show_dat,0,$output_lengts)."...";
            }
            
            // Выводим группы
			echo "<option value='".$dat."'  ".$selected." >".$show_dat."</option>";	
			++$counter;
			
            /* To do Раскраска селектора временно вырублена, переделать на стили!!!
			if ($silver == "style='background-color:ThreedFace;'") {
				$silver = "";
			} else {
				$silver = "style='background-color:ThreedFace;'";
			}*/
		}
		?></select><input type='Submit' value='&gt;&gt;' class='submit'></form></span><?php 
}
	
    if (isset($qry_cart) and $attributes[act] != 'step1' and $attributes[act] != 'step2' and  (!in_array("step1",$rights))) {
        $num_cart	=	mysql_numrows($qry_cart);
        if ($num_cart > 0) {?><span class="selector"><form action="index.php?act=step1&amp;pricelist_id=<?php echo $attributes[pricelist_id].$urladd; ?>" method="post"><input type="hidden" name="pricelist_id" value="<? echo $attributes[pricelist_id]; ?>" />
        <input type="hidden" name="type" value="1"/>
        <input type='submit' value='Оформить заказ' class='zakaz' />
    </form>
</span>
        <?php 
        }
    }

// Кнопка добавления прайса "В избранное"
if (isset($attributes[pricelist_id]) and $authentication == "yes" and (mysql_numrows($qry_favorite) == 0) and $mobile == 'false' and $attributes[act] != 'step1' and $attributes[act] != 'step2' and $attributes[act] != 'single_item') { ?>
<span class="selector"><form action="index.php?act=add_favprice<?php echo $urladd; ?>" method="post"><input type="hidden" name="pricelist_id" value="<? echo $attributes[pricelist_id]; ?>" /><input type='submit' value='В избранное' class='zakaz' /></form></span><?php
}

if ($authentication == "yes" and $attributes[act] != 'kabinet' and (!in_array("kabinet",$rights)) and $mobile == 'false') {?>
<span class="selector"><form action="index.php?act=kabinet<?php echo $urladd; ?>" method="post"><input type="submit" value="Личный кабинет" class="zakaz" /></form></span>
<?php }

if ($authentication == "yes" and $attributes[act] != 'supplier' and (!in_array("supplier",$rights)) and $mobile == 'false') {?>
<span class="selector"><form action="index.php?act=supplier<?php echo $urladd; ?>" method="post"><input type="submit" value="Каб. поставщика" class="zakaz" /></form></span>
<?php }

if ($authentication == "yes" and ($attributes[act] == 'kabinet' or $attributes[act] == 'supplier')) {?>
<span class="selector"><form action="index.php?act=mailform<?php echo $urladd; ?>" method="post"><input type="submit" value="Обратная связь" class="zakaz" /></form></span><span class="selector4">Зарегистрирован до <?php echo $user["expiration"];?></span>
<!--- span class="selector"><form action="index.php?<?php echo $urladd; ?>" method="post"><input type="Submit" value="Выход из кабинета" class="zakaz"></form></span --->
<?php }

if (($attributes[act] == 'company_prices' or $attributes[act] == 'bukva') and $mobile == 'false') {?>
<span class="selector"><form action="index.php?act=complist<?php echo $urladd; ?>" method="post"><input type="submit" value="Список компаний" class="zakaz" /></form></span>
<!--- span class="selector"><form action="index.php?<?php echo $urladd; ?>" method="post"><input type="Submit" value="Выход из кабинета" class="zakaz"></form></span --->
<?php }

if ($authentication == "no") {
    ?><span class="selector2"><form action="index.php?act=authentication<?php echo $urladd; ?>" method="post"><input type="hidden" name="query_str" value="<? echo $_SERVER["QUERY_STRING"]; ?>" /><input type="password" name="code" size="10" style='font-size:8pt;'  /><input type="submit" value="&gt;&gt;" class='submit3' style='color:green' /></form></span>
<?php } else {
echo '<span class="selector3">';
echo "<form action='index.php?act=logout".$urladd."'  method='post'>".$user["name"]." ".$user["surname"]."<input type='submit' class='submit3' value='X' style='color:red'></form></span>";
// To Do Если имя и фамилия очень длинные, то выводить только фамилию
}
?></div>
<?php if ($title != '') echo "<h2>".$title."</h2>"; ?>