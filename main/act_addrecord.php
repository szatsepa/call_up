<?php 
// Обновление информации по ценам и остатку для одной позиции прайса

header('Content-Type: text/html; charset=utf-8'); 

$str_code1 = quote_smart(trim($attributes[str_code1]));
$str_barcode = quote_smart(trim($attributes[str_barcode]));

$str_name = quote_smart(trim($attributes[str_name]));
$str_state = quote_smart(trim($attributes[str_state]));
$str_volume = quote_smart(trim($attributes[str_volume]));
$str_package = quote_smart(trim($attributes[str_package]));

$num_price_single = trim($attributes[num_price_single]);
$num_price_single = number_format($num_price_single, 2, '.', '');

$num_price_pack = trim($attributes[num_price_pack]);
$num_price_pack = number_format($num_price_pack, 2, '.', '');

$num_amount = intval(trim($attributes[num_amount]));

$pricelist_id = intval($attributes[pricelist_id]);

//$str_group = quote_smart(trim($attributes[str_group]));

// Определимся с текущей группой

$attributes[str_group1] = trim($attributes[str_group1]);
$attributes[str_group2] = trim($attributes[str_group2]);

$str_group = 'NULL';
$new_group = '';

if ($attributes[str_group1] !== '' and $attributes[str_group2] === '') {

	$str_group = quote_smart($attributes[str_group1]);

}

if ($attributes[str_group2] !== '') {

	$str_group = quote_smart($attributes[str_group2]);
	$new_group = $str_group;

}


if ($str_code1 == "''" or $str_name == "''") {
 echo '<span class="edit4">Заполните поля артикула и наименования</span>';
 exit;
} 

if ($num_amount == 0) {
 echo '<span class="edit4">Укажите остаток. Позиции с нулевым остатком не показываются.</span>';
 exit;
} 

$query4 = "SELECT * FROM pricelist
                   WHERE pricelist_id = $pricelist_id AND
                         str_code1    = $str_code1 AND 
						 str_code2 <> 'X'";
                         
$artikul_exists = mysql_query($query4) or die('<span class="edit4">Ошибка</span>'); 

if (mysql_numrows($artikul_exists) > 0) {

    echo '<span class="edit4">Позиция с данным артикулом уже существует в текущем прайсе.</span>';
    exit;

}

$query3 = "INSERT INTO pricelist 
					   (str_code1,
					    str_barcode,
					  	str_code2,
					   	str_name,
						str_state,
						str_volume,
						str_package,
						num_price_single,
						num_price_pack,
						num_amount,
						str_group,
						pricelist_id) 
				VALUES ($str_code1,
						$str_barcode,
						'V',
						$str_name,
						$str_state,
						$str_volume,
						$str_package,
						$num_price_single,
						$num_price_pack,
						$num_amount,
						$str_group,
						$pricelist_id)";
						

$result = mysql_query($query3) or die('<span class="edit4">Ошибка</span>'); 

$new_id = mysql_insert_id();

?>
<span class="edit5">Позиция <?php echo $str_name;?> добавлена</span>
<script language="JavaScript">
$(document).ready(function() {
$("#ssylki").append("<tr ><td><?php echo str_replace("'","",$str_code1); ?></td><td><?php echo str_replace("'","",$str_barcode); ?></td><td>V</td><td><strong><?php echo str_replace("'","",$str_name); ?></strong></td><td><?php echo str_replace("'","",$str_state); ?></td><td><?php echo str_replace("'","",$str_volume);?></td><td><?php echo str_replace("'","",$str_package); ?></td><td><?php echo $num_price_single; ?></td><td><?php echo $num_price_pack; ?></td><td><?php echo $num_amount; ?></td><td><button class='cart' id='e<?php echo $new_id;?>'>Редакт.</button><button class='cart2' id='s<?php echo $new_id;?>' style='display:none;'>Сохранить</button>&nbsp;<a href='#' class='cloud' id='d<?php echo $new_id;?>' title='Удалить'>x</a></td></tr>");

$("#no_goods").empty();

});
document.add_record.reset();

<?php

// Установим значение новой группы, если нужно
// Оно будет добавляться по умолчанию
if ($new_group != '') { ?>

$("#current_group").text(<?php echo $new_group; ?>);
$("#str_group1").val(<?php echo $new_group; ?>);
$("#group").append("<option value=<?php echo $new_group; ?>><?php echo str_replace ("'","",$new_group); ?></option>");
$("#group option[value=<?php echo $new_group;?>]").attr("selected", "selected");

<?php } ?>

</script>