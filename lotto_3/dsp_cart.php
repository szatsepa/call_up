<br />
<?php if ($mobile != 'true') { ?>
<div style="margin-left:5px;margin-bottom:10px;">
<?php }

//$num_rows	=	count($artikul_arr);
//$num_fields	= count($artikul_arr[0]);

$field_count	=	0;



if(count($artikul_arr, COUNT_RECURSIVE)){
       
$fields = array ("Артикул","Штрих-код","&nbsp;","Наименование","Страна","Емкость","Фасовка","Цена ед.","Кол-во (шт.)","Скидка");

$array_fields = array("str_code1","str_barcode","str_code2","str_name","str_state","str_volume","str_package","num_price_single","num_amount","num_discount");


echo "<table border='0' class='cart'>";


// Выводим заголовок таблицы


foreach ($fields as $value) {
    
//    if ($mobile == 'false' or $attributes[act] == 'private_office') {}
        echo "<th class='cart'>".$value."</th>";
    // Место под кнопку
}

echo "<th class='cart'>&nbsp;</th>";

$row_count = 0;

$total = 0;

foreach ($artikul_arr as $key => $value) {
        
    echo "<tr>";
    
    $field_count = 0;
    
    foreach ($value as $keys => $val) {
                    
           if($array_fields[$field_count] == $keys) echo "<td class='cart'>".$val."</td>";
           
          ++$field_count; 
         }
    $single_price = $value[num_price_single]; 
    $amount       = $value[num_amount];
    $price_id     = $value[pricelist_id];
    $discount = $value[num_discount];
    $total += ($single_price*$amount)*(1-$discount/100);
    
    $artikul = $value[str_code1];
    echo "<td class='cart'><form action='index.php?act=del_item' method='post'><input type='hidden' name='artikul' value='".$artikul."'><input type='hidden' name='stid' value='".$attributes[stid]."'><input class='submit3' type='submit' value='X'></form></td>";
    
   echo "</tr>"; 
      
 ++$row_count;
    
}


if ($total == 0) {
//    echo"<tr><td colspan='9'>В корзине нет товаров</td><td colspan='2' align='right'>&nbsp;</td></tr>";
}
echo"<tr><td colspan='9'></td><td class='cart' colspan='2' align='right'>Итого: ".$total."руб. </td></tr>";
echo "</table>";

if ($mobile != 'true') {?>
</div>
<?php }
}
?>