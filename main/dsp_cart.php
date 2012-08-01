<br />
<?php if ($mobile != 'true') { ?>
<div style="margin-left:5px;margin-bottom:10px;">
<?php }

$num_rows	=	mysql_numrows($qry_cart);
$num_fields	=	mysql_num_fields($qry_cart);

$field_count	=	0;

$array_fields = array();

while ($field_count < $num_fields) {

	$array_fields[$field_count] = mysql_field_name($qry_cart, $field_count);
	++$field_count;
}

$fields = array ("Артикул","Штрих-код","&nbsp;","Наименование","Страна","Емкость","Фасовка","Цена ед.","Цена кор.","Кол-во (шт.)","Скидка");
//,"Клиент"
if ($mobile == 'true') {
    echo "<table border='1' cellspacing='0' cellpadding='3'>";
} else {
    echo "<table class='cart'>";
}

// Выводим заголовок таблицы
$th = 0;
while ($th < count($fields)) {
    if ($attributes[act] == 'step1' and $mobile == 'true' and ($th == 3 or $th == 9 or $th == 10)) {
        echo "<th class='cart'>".$fields[$th]."</th>";
    }
	
    if ($mobile == 'false' or $attributes[act] == 'step2') {
        echo "<th class='cart'>".$fields[$th]."</th>";
    }
    
	++$th;
}

// Место под кнопку
if ($attributes[act] == 'step1' or $attributes[act] == 'kabinet') {
    echo "<th class='cart'>&nbsp;</th>";
}

$row_count = 0;
$total = 0;

while ($row_count < $num_rows) {
	echo "<tr>";	
	$field_count 	= 	0;	
    // -4 -- не выводим последние 4 поля 
	while ($field_count < $num_fields - 7) {
        $dat = mysql_result($qry_cart,$row_count,$array_fields[$field_count]);
		if ($attributes[act] == 'step1' and $mobile == 'true' and ($field_count == 3 or $field_count == 9 or $field_count == 10)) {
            echo "<td class='cart'>".$dat."</td>";
         }
         
         if ($mobile == 'false' or $attributes[act] == 'step2') {
            echo "<td class='cart'>".$dat."</td>";
         }
         				
		++$field_count;
	}
    
    if ($attributes[act] == 'step1' or $attributes[act] == 'kabinet') {
		 $artikul = mysql_result($qry_cart,$row_count,$array_fields[0]);
        echo "<td class='cart'><form action='index.php?act=delcart' method='post'><input type='hidden' name='artikul' value='".$artikul."'><input type='hidden' name='query_str' value='".$_SERVER['QUERY_STRING']."'><input class='submit3' type='submit' value='X'></form></td>";
    }
	echo "</tr>";
    
    $single_price = mysql_result($qry_cart,$row_count,$array_fields[7]);
    $amount       = mysql_result($qry_cart,$row_count,$array_fields[9]);
	$price_id     = mysql_result($qry_cart,$row_count,$array_fields[12]);
	$zakaz_limit  = mysql_result($qry_cart,$row_count,$array_fields[16]);
    
    $total += $single_price*$amount;
       
	++$row_count;
}

$colspan = 10;
if ($mobile == 'true' and $attributes[act] == 'step1') $colspan = 2;
if ($attributes[act] == 'step2') $colspan = 9;
if ($total == 0) {
    echo"<tr><td colspan='".$colspan."'>В корзине нет товаров</td><td colspan='2' align='right'>&nbsp;</td></tr>";
}
echo"<tr><td colspan='".$colspan."'></td><td colspan='2' align='right'>Итого: ".$total."руб. </td></tr>";
echo "</table>";

if ($mobile != 'true') {?>
</div>
<?php } ?>