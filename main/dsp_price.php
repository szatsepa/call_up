<script type="text/javascript">
	$(document).ready(function(){
	     
         $('.cart').live("click", function() {
              
            o_group = $(this).parent().prev().prev().prev().prev().prev().prev().prev();
            o_ced = $(this).parent().prev().prev().prev();
            o_kor = $(this).parent().prev().prev();
            o_am  = $(this).parent().prev();
            
            new_group = o_group.text();
            cena_ed  = o_ced.text();
            cena_kor = o_kor.text();
            amount   = o_am.text();
            
            o_group.text("");
            o_ced.text("");
            o_kor.text("");
            o_am.text("");
            
            $("<input size='18' type='Text'>").appendTo(o_group);
            $("<input maxlength='8' size='8' type='Text'>").appendTo(o_ced);
            $("<input maxlength='8' size='8' type='Text'>").appendTo(o_kor);
            $("<input maxlength='6' size='6' type='Text'>").appendTo(o_am);
            
            o_group.children().val(new_group);
            o_ced.children().val(cena_ed);
            o_kor.children().val(cena_kor);
            o_am.children().val(amount);
           
            
            tt = $(this).attr("id") + " " + new_group + " " + cena_ed + " " + cena_kor + " " + amount;
            
//            alert (tt);
            
            $(this).hide();
            $(this).next().show();
            $(this).next().next().hide();
            //$(this).addClass("cart2");
            
            return false;
        }); 
        
        
        $('.cart2').live("click", function() {
            
            o_group = $(this).parent().prev().prev().prev().prev().prev().prev().prev();
            o_ced = $(this).parent().prev().prev().prev();
            o_kor = $(this).parent().prev().prev();
            o_am  = $(this).parent().prev();
            
            str_group =o_group.children().val();
            num_price_single = o_ced.children().val();
            num_price_pack   = o_kor.children().val();
            num_amount       = o_am.children().val();
            
             $("#edit").load('index.php',{'act':'updsingleitem',
                                                'str_group':str_group,
                                                'num_price_single':num_price_single,
                                                'num_price_pack':num_price_pack,
                                                'num_amount':num_amount,
                                                'butt_id':$(this).attr("id")}); 
            
            alert (str_group + ' ' + num_price_single + ' ' + num_price_pack + ' ' + num_amount);
            
            return false;
        }); 
	    
		 $('.cloud').live("click", function() {
            
             if (confirm("Вы уверены, что хотите удалить эту позицию?\nЭто может привести к изменению истории покупок.")) {			
					           
            	 $("#edit").load('index.php',{'act':'delsingleitem',
                	                                'butt_id':$(this).attr("id")}); 
                     
			 }
			
			return false;
        }); 
		
    });
 
</script>

<?php

//echo $query;

// Защита от прямого набора 
if (!isset($qry_price)) exit();

$num_rows	 =	mysql_numrows($qry_price);
$num_fields	 =	mysql_num_fields($qry_price);
$images_root =  $document_root . '/images/goods/';

// Заполним массив корзины текущими заказами (артикул--кол-во)
// disc -- скидка
$cart = array();
$disc = array();

while ($row_cart = mysql_fetch_assoc($qry_cart)){
	$artikul        = $row_cart["str_code1"];
	$amount         = $row_cart["num_amount"];
	$cart[$artikul] = $amount;
	$disc[$artikul] = $row_cart["num_discount"];
}

// Количество строк прайса на странице
if ($mobile == 'true') {
    $per_page	=	25;
} else {
    $per_page	=	25;
}

$row3         = mysql_fetch_assoc($qry_aboutprice);
$company_id   = $row3["company_id"];
$company_name = $row3["company_name"];
$price_name   = $row3["price_name"];
$status       = $row3["status"];

//Блокировка для незарегистрированных пользователей
$disabled = '';
//$dat = mysql_result($qry_price,$row_count,"num_amount");
if ($authentication == "no" or (in_array("add_cart",$rights))) {
    $disabled = 'disabled';
}

?>
<div class="prname"><a href="index.php?act=company_prices&amp;company_id=<?php echo $company_id.$urladd; ?>"><?php echo $company_name; ?></a>&nbsp;/&nbsp;<a href="index.php?act=single_price&amp;pricelist_id=<?php echo $attributes[pricelist_id].$urladd; ?>"><?php echo $price_name; ?></a></div>
<?php
if ($attributes[act] == 'single_item') {
	$barcode        = mysql_result($qry_price,0,"str_barcode");
	$item_name_head = mysql_result($qry_price,0,"str_name");
	echo "<h2>$item_name_head<br />$attributes[artikul]#$barcode</h2>";

}
	
	
$num_pages	= 	ceil($num_rows / $per_page); // Количество страниц прайса

if(!isset($attributes[page]) || $attributes[page] > $num_pages) {
	$attributes[page] = 1;
} 

if (isset($attributes[next_page]) and $attributes[next_page] > 0) {
    $attributes[page] = $attributes[next_page];
}

$current_page = $attributes[page];
$act = "act=".$attributes[act]."&amp;pricelist_id=".$attributes[pricelist_id]."&amp;";
/*if (isset($attributes[act])) {
	$act = "act=".$attributes[act]."&";
}*/

// Устанавливаем границы вывода страниц
$pages = $attributes[page] - 1;
if ($pages <= 1) {
    $pages = 1;
    $left_dots = '';
} else {
    $left_dots = '...';
}

$pages_end = $attributes[page] + 1;
if ($pages_end >= $num_pages) {
    $pages_end = $num_pages;
    $right_dots = '';
} else {
    $right_dots = '...';
}

$border = "";
$pages_display = '';
if (isset($attributes[border])) $border = "&amp;border=".$attributes[border];

if ($num_rows > $per_page){
	$pages_display .= "<div align='right'>Стр. ".$left_dots;    
	while ($pages <= $pages_end) {		
		if ($pages == $current_page) {
			$pages_display .= $pages."&nbsp;";
		} else {
			$pages_display .= "<a href='index.php?".$act."page=".$pages.$border.$urladd."'>".$pages."</a>&nbsp;";
		}	
		++$pages;
	}
	$pages_display .= $right_dots;
    $pages_display .= "&nbsp;<form action='index.php?".$urladd."' method='get'>";  
    
    if (isset($attributes[border])){
        $pages_display .= "<input type='hidden' name='border' value='$attributes[border]'>";
    }
    
    $pages_display .= "<input type='hidden' name='act' value='$attributes[act]'>";
    $pages_display .= "<input type='hidden' name='pricelist_id' value='$attributes[pricelist_id]'>";
    
    
    $pages_display .= "<select name='page' class='common' onchange='javascript:this.form.submit();'>";
        
    for ($i = 1;$i <= $num_pages; ++$i){
        if ($i == $current_page){
            $selected_page = ' selected ';
        } else {
            $selected_page = '';
        }
        $pages_display .= "<option value=".$i.$selected_page.">".$i;
    }    
    $pages_display .= "</option>"; 
    $pages_display .= "</select></form>";
    $pages_display .= "</div>";
    echo $pages_display;
} else {
	echo "<p align='right'>&nbsp;</p>";
}


$row_count 		=	($current_page - 1) * $per_page;
$row_end		=	$row_count + $per_page;
if ($row_end > $num_rows) {
	$row_end	=	$num_rows;
}

$field_count	=	0;

$array_fields = array();

while ($field_count < $num_fields - 1) {

	$array_fields[$field_count] = mysql_field_name($qry_price, $field_count);
	++$field_count;
}
//print_r ($array_fields);

// Вывод прайс-листа

if ($attributes[act] <> 'edit_price') {   	

    $fields = array ("Артикул","Штрих-код","&nbsp;","Наименование","Страна","Емкость","Фасовка","Цена ед.","Цена кор.","Остаток (шт.)","Кол-во (шт.)","Скидка","&nbsp;");
} else {
    $fields = array ("Артикул","Штрих-код","&nbsp;","Наименование","Группа","Страна","Емкость","Фасовка","Цена ед.","Цена кор.","Остаток (шт.)","Действие");
}

// Выводим блокированные только для редактирования
if ($mobile == 'false' and ($status == 1 or ($status == 2 and $attributes[act] == 'edit_price'))) {

    echo "<br /><table class='dat' id='ssylki'>";
    $th = 0;
    while ($th < count($fields)) {
    	echo "<th class='dat'>".$fields[$th]."</th>";
    	++$th;
    }
    echo "<tbody>";
    $silver = "style='background-color:ThreedFace;'";
    while ($row_count < $row_end) {
        
        $ostatok = mysql_result($qry_price,$row_count,$array_fields[10]);
        
        // Отображаем нулевые остатки только в редактировании прайса
        if ($attributes[act] <> 'edit_price') {         
            if ($ostatok == 0) {
                ++$row_count;
                continue; 
            } 
        }
        
    	if ($silver == "style='background-color:ThreedFace;'") {
    				$silver = "";
    	} else {
    		$silver = "style='background-color:ThreedFace;'";
    	}
    	echo "<tr ".$silver.">";
    	$id 			= 	mysql_result($qry_price,$row_count,$array_fields[0]);
    	$field_count 	= 	1;
        
        if ($attributes[act] <> 'edit_price') {
        
        	echo "<form action=index.php?act=add_cart&amp;page=".$current_page.$urladd." method=post>";
        	echo "<input type='Hidden' name='id' value=".$id.">";
            echo "<input type='Hidden' name='pricelist_id' value=".$attributes[pricelist_id].">";
    		
        }
        
		$bold    = '';
		$ordered = '';
		$skidka  = 0;
		
        while ($field_count < $num_fields - 1) {	
    		$dat = mysql_result($qry_price,$row_count,$array_fields[$field_count]);
//            echo $dat."<br/>";
            // Артикул?
            if ($field_count == 1) {
                $artikul = $dat;
				if (array_key_exists($artikul,$cart)) {
					$bold    = "style='background-color:#ccffcc;'";
					$ordered = $cart[$artikul];
					$skidka  = '';
				} else {
					$ordered = 1;
				}
            }
            
            // Служебное поле str_code2?
            if ($field_count == 3) {
                $str_code2 = $dat;
            }
            
             // Фасовка?
            if ($field_count == 7) {
                $package = $dat;
            }
            
            // Наименование товара?
    		if ($field_count == 4) {
                // Разберемся, какую картинку выводить
                $md5name_1 = md5name_1($artikul);
                $picture = $images_root.$md5name_1.".jpg";
                if (file_exists($picture)) {
                    $pic_name = $md5name_1.".jpg";
                } else {
                    $pic_name = "no_pic.jpg";
                }
                ?><td <?php echo $bold; ?>><a href="index.php?act=single_item&amp;pricelist_id=<?php echo $attributes[pricelist_id];?>&amp;artikul=<?php echo $artikul.$urladd; ?>" id="<?php echo $artikul; ?>"><?php echo $dat."</a></td>";
    		} else {	
                // Не показываем остаток незалогиненым пользователям	
    			if ($authentication == "no" and $field_count == 10) {
                    echo "<td $bold>&nbsp;</td>";
                } else {
                    if ($dat == 999999999){
                        echo "<td style='text-align:center;' $bold>&amp;</td>";
                    } else {
                        echo "<td $bold>".$dat."</td>";
                    }
                }
    		}
    		++$field_count;
    	}
    	
    	if ($attributes[act] <> 'edit_price') {   	
        	echo "<td><input type='Text' maxlength='4' size='4' name='amount' value='$ordered' " . $disabled . " $bold></td>";
        	echo "<td><input type='Text' maxlength='6' size='6' name='discount' value='$skidka' " . $disabled . " $bold></td>";
        	echo "<td><input type='Submit' value='&gt;&gt;' " . $disabled . " $bold></td>";
        	if (isset($attributes[border])) echo "<input type='Hidden' name='border' value='".$attributes[border]."'>";
        	if (isset($attributes[group])) echo "<input type='Hidden' name='group' value='".$attributes[group]."'>";
            echo "<input type='Hidden' name='artikul' value=".$artikul.">";
            
            // Выводим количество шт. в упаковке, чтобы товар принудительно был заказан упаковками 
            if ($str_code2 == '') {
                echo "<input type='Hidden' name='package' value='".$package."'>";
            }
        	
            echo "</form>";        
        
        } else {
            
			// Удаленные через редактирование позиции -- не показываем управление
            if ($str_code2 == 'X') {
			
				echo "<td>&nbsp;</td>";
			
			} else {
			// Здесь выводятся иконки действий
            	echo "<td width='100'><button class='cart' id='e".$id."'>Ред.</button><button class='cart2' id='s".$id."' style='display:none;'>Сохранить</button>&nbsp;<a href='#' class='cloud' id='d".$id."' title='Удалить'>x</a></td>";
			}
        
        }
        
        echo "</tr>";
    
    	++$row_count;
    }
    
    if ($num_rows == 0) echo "<tr><td colspan='12'>&nbsp;</td></tr><tr><td colspan='12'><strong id='no_goods'>Нет товаров для отображения</strong></td></tr><tr><td colspan='12'>&nbsp;</td></tr>";    
    echo "</tbody>"; 
    echo "</table>";
    
    
    echo $pages_display;
?>  

<?php // Специфическая информация для одиночного товара
if ($attributes[act] == "single_item") {

	// Показывем котировку зарегистрированному пользовтелю
    if ($authentication == "yes") {
    
        //kotirovka($barcode,$user[id],$attributes[pricelist_id],'button');
    
    }
	
	// Выводим описание товара и картинку если есть штрих-код
	tovar($barcode);
	
	tovar_pic($barcode,"");
	

 } // End if ($attributes[act] == "single_item") 
 ?>     
    <!-- br />&nbsp;&nbsp;<a href='flash/index.html'>Галерея товаров</a -->

    <div id="edit"></div>
    
	
<?php } // End if ($mobile == 'false')

// To do сделать обработку str_code2 для мобильной версии

// Выводим список товаров в мобильном прайсе
if ($mobile == 'true' and ($attributes[act] == 'single_price' or $attributes[act] == 'add_cart')  and $status == 1) {
    
    echo "<br><table border='1' cellspacing='0' cellpadding='2' width='100%'>";
    echo "<th>Товар</th><th>Скид.</th><th>Кол.</th>";
    echo "<form action='index.php?act=add_cart&amp;page=".$current_page.$urladd."' method='post'>";	
    echo "<input type='hidden' name='pricelist_id' value='".$attributes[pricelist_id]."'>";
    if (isset($attributes[border])) echo "<input type='hidden' name='border' value='".$attributes[border]."'>";
  	if (isset($attributes[group])) echo "<input type='hidden' name='group' value='".$attributes[group]."'>";
    
   $amount = '';
    
   while ($row_count < $row_end) {
    	
    	$id 			= 	mysql_result($qry_price,$row_count,"id");
    	$artikul        =   mysql_result($qry_price,$row_count,"str_code1");
        $str_code2      =   mysql_result($qry_price,$row_count,"str_code2");
        $name           =   mysql_result($qry_price,$row_count,"str_name");
        $volume         =   mysql_result($qry_price,$row_count,"str_volume");
	    $package        =   mysql_result($qry_price,$row_count,"str_package");
        $price_single   =   mysql_result($qry_price,$row_count,"num_price_single");
        
        if ($authentication == "yes") {
            $amount  =   "(".mysql_result($qry_price,$row_count,"num_amount").")";    
        }  
        
 		if (array_key_exists($artikul,$cart)) {
        	$bold    = " class='marked'";
        	$ordered = $cart[$artikul];
        	$skidka  = $disc[$artikul];
        } else {
            $bold    = '';
        	$ordered = '';
            $skidka  = '';
        }

        
        echo "<tr>";    
		echo "<input type='hidden' name='artikul$row_count' value='".$artikul."'>";
		if ($ordered != '') {
			echo "<input type='hidden' name='exist$row_count' value='".$ordered."'>";
		}
        // Выводим количество шт. в упаковке, чтобы товар принудительно был заказан упаковками 
        if ($str_code2 == '') {
            echo "<input type='hidden' name='package$row_count' value='".$package."'>";
        }
        echo "<td$bold>$name; Ост. - $amount<br>Емк.$volume; Фас.$package; Цена $price_single</td>";
        echo "<td$bold><input type='text' maxlength='6' size='3' name='discount$row_count' value='$skidka' " . $disabled . "  class='pr'></td>";
        echo "<td$bold><input type='text' maxlength='4' size='3' name='amount$row_count' value='$ordered' " . $disabled . " class='pr'></td>";
        echo "</tr>";

    	++$row_count;
    } // Закончили вывод таблицы товаров
	echo "<tr><td colspan='3' align='right'><input type='submit' value='Добавить в корзину' ".$disabled.">";
    if ($current_page < $num_pages){
        echo "<br><input type='checkbox' name='next_page' value='".($current_page + 1)."'> и перейти на след. страницу";
    }
    echo "</td></tr>";
    
    // Здесь сообщается, сколько товаров на странице
	echo "<input type='hidden' name='goods' value='".$row_count."'>";
	
    echo "</form>";
    echo "</table>";
    
    if ($num_rows == 0) echo "<p>Нет товаров для отображения</p>";
    
    echo $pages_display;
    
} // End if ($mobile == 'true' and $attributes[act] == 'single_price')




// Выводим единичный товар для мобилки

if ($mobile == 'true' and $attributes[act] == 'single_item'  and  $status == 1) {
    while ($row_count < $row_end) {
    	
    	$id 			= 	mysql_result($qry_price,$row_count,$array_fields[0]);
    	$field_count 	= 	1;
    	echo "<form action=index.php?act=add_cart&page=".$current_page.$urladd." method=post>";
    	echo "<input type='Hidden' name='id' value=".$id.">";
        echo "<input type='Hidden' name='pricelist_id' value=".$attributes[pricelist_id].">";
        while ($field_count < $num_fields - 1) {	
    		$dat = mysql_result($qry_price,$row_count,$array_fields[$field_count]);
            
			// To do Здесь внимательно проверить на мобиле!!!!!
         	if ($field_count != 2) {
    			echo "<b>".$fields[$field_count - 1].":</b> ".$dat."<br />";
    		}
    		++$field_count;
    	}
    	
    	$disabled = '';
    	//$dat = mysql_result($qry_price,$row_count,"num_amount");
    	if ($authentication == "no") {
    		$disabled = 'disabled="disabled"';
    	}
    	
        echo "<div class='head'>Заказ:</div>";
    	echo "<table border=0><tr><td>Кол-во(шт.)</td><td><input type='Text' maxlength='4' size='4' name='amount' value='1' " . $disabled . " ><td/></tr>";
    	echo "<tr><td>Скидка</td><td><input type='Text' maxlength='2' size='2' name='discount' value='0' " . $disabled . " ><td/></tr></table>";
    	echo "<input type='Submit' value='Заказать' " . $disabled . " ><br />";
    	if (isset($attributes[border])) echo "<input type='Hidden' name='border' value='".$attributes[border]."'>";
    	if (isset($attributes[group])) echo "<input type='Hidden' name='group' value='".$attributes[group]."'>";
    	echo "</tr></form>";
    
    	++$row_count;
    }
    if ($num_rows == 0) echo "<br />Нет товаров для отображения<br />";
}


if ($status == 0 and $attributes[act] != "edit_price") {
    echo "<p>&nbsp;&nbsp;<b>Прайс-лист удален.</b></p>";
}

if ($status == 2 and $attributes[act] != "edit_price") {
    echo "<p>&nbsp;&nbsp;<b>Прайс-лист заблокирован и будет доступен через некоторое время.</b></p>";
}

 ?>