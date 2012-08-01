<?php 
header('Content-Type: text/html; charset=utf-8');

$id = substr($attributes[butt_id],1);
$new_button = "e".$id;
$del_button = "s".$id;

$add_message = "";

// Сделать выборку товара по id
// Оттуда опеределяем артикул и номер прайса
// Далее делаем проверку по истории
// Цены берем оттуда, количекство товара обнуляем, эти данные записываем "в дисплей"

// Определим, что это за товар (артикул/прайс)
$query = "SELECT Id, 
			     str_code1, 
				 str_barcode, 
				 str_code2, 
				 num_amount, 
				 pricelist_id
			FROM pricelist 
		   WHERE Id=$id";
		   
$qry_tovar = mysql_query($query) or die($query);


if (mysql_num_rows($qry_tovar) == 1) {

	$row_tovar = mysql_fetch_assoc($qry_tovar);
	
	$artikul  = quote_smart($row_tovar["str_code1"]);
	$price_id = $row_tovar["pricelist_id"];
	
	
	
	$query = "SELECT zakaz
				FROM arch_goods 
		   	   WHERE artikul=$artikul AND
		        	 price_id=$price_id AND 
					 amount > 0";
		   
	$qry_zakaz = mysql_query($query) or die($query);

	// Обнулим остатки в истории
	$query2 = "UPDATE arch_goods
				  SET amount = 0 
		   	   WHERE artikul=$artikul AND
		        	 price_id=$price_id AND 
					 amount > 0";
		   
	$qry_upd1 = mysql_query($query2) or die($query2);
	
	// Обновим позицию в прайсе
	$query3 = "UPDATE pricelist
				  SET num_amount = 0,
				  	  str_code2  = 'X'
		   	    WHERE Id=$id";
		   
	$qry_upd2 = mysql_query($query3) or die($query3);
	
	if (mysql_num_rows($qry_zakaz) > 0) {
	
		$add_message = '\nИзменено заказов в истории: '.mysql_num_rows($qry_zakaz);
	
	}

} else { ?>
<script language="JavaScript">

	alert("Произошла ошибка при удалении.");
	
</script>
<?php
exit;
}

?>

<script language="JavaScript">


 //o_ced = $("#<?php echo $attributes[butt_id];?>").parent().prev().prev().prev().children();
 //o_kor = $("#<?php echo $attributes[butt_id];?>").parent().prev().prev().children();
 o_am  = $("#<?php echo $attributes[butt_id];?>").parent().prev();
 
 $("#<?php echo $attributes[butt_id];?>").parent().parent().css("background-color","#cccc99");
 $("#<?php echo $attributes[butt_id];?>").parent().parent().css("color","#818181");
 
 //o_ced.replaceWith("<?php echo $ced;?>");
 //o_kor.replaceWith("<?php echo $kor;?>");
 o_am.replaceWith("0");
 
 $("#<?php echo $attributes[butt_id];?>").hide();
 $("#<?php echo $new_button;?>").hide();
 $("#<?php echo $del_button;?>").hide();

 alert('Позиция удалена.<?php echo $add_message;?>'); 
 
</script>