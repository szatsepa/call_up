<?php 
if (isset($cart_count)) {
	$message = '&nbsp;'.$cart_count;
} else {
	$message = '';
}

if($price_id =='' and isset($pricelist_id) and $pricelist_id > 0) {
	$price_id = $pricelist_id;
}
?>
<br/>&nbsp;
<form action="index.php?act=single_price&pricelist_id=<?php echo $price_id.$urladd; ?>" method="post" name="nForm2" id="nForm2">
<input type="submit" value="Прайс заказа<?php echo $message; ?>" class="submit2">
</form>
<?php if ($attributes[act] == 'kabinet') {?>
<form action="index.php?act=step1&pricelist_id=<?php echo $price_id; ?>" method="post">
<input type="hidden" name="type" value="1"/>
<input type='Submit' value='Оформить заказ<?php echo $message; ?>'   class="submit2">
</form>
<?php } ?>
<form action="index.php?act=del_zakaz&pricelist_id=<?php echo $price_id; ?>" method="post">
<input type='Submit' value='Удалить заказ<?php echo $message; ?>'  class="submit2">
</form>
<br />