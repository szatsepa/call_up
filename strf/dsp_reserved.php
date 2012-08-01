<br />
<?php if ($mobile != 'true') { ?>
<div style="margin-left:5px;margin-bottom:10px;">
<?php }

$num_rows	=	count($reserveds_arr);
$num_fields	= count($reserveds_arr[0]);

$field_count	=	0;

$array_fields = array();

//print_r($reserveds_arr);
//
//echo "<br/>";

//if(count($arrtikul_arr) > 0){}

foreach ($reserveds_arr[0] as $key => $value) {
    
    array_push($array_fields, $key);
    
}

$fields = array ("Артикул","Штрих-код","&nbsp;","Наименование","Страна","Емкость","Фасовка","Цена ед.","Кол-во (шт.)","Скидка");

    echo "<table border='0' class='cart'>";


// Выводим заголовок таблицы


foreach ($fields as $value) {
    
    if ($mobile == 'false' or $attributes[act] == 'private_office') {
        echo "<th class='cart'>".$value."</th>";
    }
    // Место под кнопку

}
if ($attributes[act] == 'private_office') {
    echo "<th class='cart'>&nbsp;</th>";
}


$row_count = 0;

$total = 0;

foreach ($reserveds_arr as $key => $value) {
             echo "<tr>";	
	$field_count 	= 	0;
        
        foreach ($value as $keys => $val) {
            
           if($array_fields[$field_count] == $keys) echo "<td class='cart'>".$val."</td>";
           
           ++$field_count; 
         }
         $single_price = $reserveds_arr[$row_count][num_price_single]; 
    $amount       = $reserveds_arr[$row_count][num_amount];
	$price_id     = $reserveds_arr[$row_count][pricelist_id];
        $discount = $reserveds_arr[$row_count][num_discount];
//	$zakaz_limit  = $reserveds_arr[$row_count][$array_fields[16]];
    
    $total += ($single_price*$amount)*(1-$discount/100);
    
    if ($attributes[act] == 'private_office') {}
		 $artikul = $reserveds_arr[$row_count][str_code1];
        echo "<td class='cart'><form action='index.php?act=del_reserved_item' method='post'><input type='hidden' name='artikul' value='".$artikul."'><input type='hidden' name='stid' value='".$attributes[stid]."'><input class='submit3' type='submit' value='X'></form></td>";
    
    
         echo "</tr>"; 
//         print_r($attributes);       
         ++$row_count;
            }


$colspan = 10;
if ($mobile == 'true' and $attributes[act] == 'private_office') $colspan = 2;
if ($attributes[act] == 'private_office') $colspan = 9;
if ($total == 0) {
    echo"<tr><td colspan='".$colspan."'>В корзине нет товаров</td><td colspan='2' align='right'>&nbsp;</td></tr>";
}
echo"<tr><td colspan='".$colspan."'></td><td class='cart' colspan='2' align='right'>Итого: ".$total."руб. </td></tr>";
echo "</table>";

if ($mobile != 'true') {?>
</div>
<?php } ?>