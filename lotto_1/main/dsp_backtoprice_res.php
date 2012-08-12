<?php 
if (isset($cart_count)) {
	$message = '&nbsp;'.$cart_count;
} else {
	$message = '';
}


?>
<br/>&nbsp;
<!--width="100"-->
<table class="btp" border="0" >
    
    <tbody>
        <tr>
            <td class="btp">
                <form action="index.php?act=look" method="post" name="nForm2" id="nForm2">
                    <input type="hidden" name="cod" value="<?php echo $attributes[cod];?>"/>
                     <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
                    <input type="hidden" name="select" value="prices"/>
                    <input type="hidden" name="group" value="<?php echo $price_id; ?>"/>
                    <input type="submit" onmouseover="this.style.color='#BB0D72'" onmouseout="this.style.color='#FFFFFF'" value="Прайс заказа<?php echo $message; ?>" class="submit2"/>
                </form>
            </td>
            <td class="btp">
                <form action="index.php?act=reserve_to_order" method="post">
                    <input type="hidden" name="stid" value="<?php echo $attributes[stid]; ?>"/>
                    <input type="hidden" name="price_id" value="<?php echo $price_id; ?>"/>
                    <input type="hidden" name="amount" value="1"/>
                    <input type="hidden" name="type" value="4"/>
                    <input type='Submit' onmouseover="this.style.color='#BB0D72'" onmouseout="this.style.color='#FFFFFF'" value='Переместить в корзину<?php echo $message; ?>'   class="submit2"/>
                </form>
            </td>
            <td class="btp"><form action="index.php?act=del_reserve" method="post">
                    <input type="hidden" name="stid" value="<?php echo $attributes[stid]; ?>"/>
                    <input type="hidden" name="price_id" value="<?php echo $price_id; ?>"/> 
                    <input type='Submit' onmouseover="this.style.color='#BB0D72'" onmouseout="this.style.color='#FFFFFF'" value='Отменить<?php echo $message; ?>'  class="submit2" />
                </form>
            </td>
        </tr>
    </tbody>
</table>
<br />