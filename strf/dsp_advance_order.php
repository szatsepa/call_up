<table class='cart'>
    <tr>
        <td class='cart' style="font-size: 18px; font-weight: bold">
<?php

/*
 * created by arcady.1254@gmail.com
 */
if ($title != '') echo "<br/><h2>".$title."</h2><br/>";

?>
                  </td>
    </tr>
</table>
<!--<br/>&nbsp;-->
<!--width="100"-->
<table class="btp" border="0" >
     
    <tbody>
        <tr>
            <td class="btp">
                <form action="index.php?act=look" method="post">
                    <input type="hidden" name="cod" value="<?php echo $attributes[cod];?>"/>
                    <input type="hidden" name="select" value="prices"/>
                    <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
                    <input type="hidden" name="group" value="<?php echo $price_id; ?>"/>
                    <input type="submit" onmouseover="this.style.color='#CCCCCC'" onmouseout="this.style.color='#FFFFFF'" value="Прайс заказа<?php echo $message; ?>" class="submit2"/>
                </form>
            </td>
            <td class="btp">
                <form action="index.php?act=del_order" method="post">
                    <input type="hidden" name="stid" value="<?php echo $attributes[stid]; ?>"/>
                    <input type="hidden" name="price_id" value="<?php echo $price_id; ?>"/> 
                    <input type='Submit' onmouseover="this.style.color='#CCCCCC'" onmouseout="this.style.color='#FFFFFF'" value='Удалить заказ<?php echo $message; ?>'  class="submit2" />
                </form>
            </td>
        </tr>
    </tbody>
</table>
<br />

<?php 

$price = $price_id;

include 'dsp_cart.php';

$contragent_name = $_SESSION[user]->data[name]." ".$_SESSION[user]->data[surname];
?>

<br />
<div class = "cont_reg">
            
<form action="index.php?act=create_order" method="post" name="addform" enctype="multipart/form-data"> 
    <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/>
    <input type="hidden" name="price_id" value="<?php echo $price; ?>"/>
    <input type="hidden" name="contragent_id" value="<?php echo $_SESSION[user]->data[id];?>"/> 
    <div id = "cont_reg_left">
                    <br/>
                    <br/>
                    <br/>

                    <div id = "cont_reg_left_3">E-mail: </div>
                    <div id = "cont_reg_left_4"><input type="text" required id="eml"  onblur="return isEmailCorrect()" name="e_mail" size="30" value="<?php echo $_SESSION[user]->data[email];?>"/></div>
                    <div id = "cont_reg_left_3">Адрес доставки: </div>
                    <div id = "cont_reg_left_66"><textarea rows="3" cols="29" name="adress"><?php echo $_SESSION[user]->data[shipping_address];?></textarea></div>
                    <div id = "cont_reg_left_3">Пожелания заказчика: </div>
                    <div id = "cont_reg_left_66"><textarea rows="3" cols="29" name="desire"></textarea></div>
                    <div id = "cont_reg_left_3">Метка: </div>
                    <div id = "cont_reg_left_4"><input type="text" name="mark" size="30"/></div>
                    <div id = "cont_reg_left_3">Отсрочить до: </div>
                    <div id = "cont_reg_left_4"><input type="text" maxlength="2" size="2" name="day" class="step1" value=""/>-<input type="text" maxlength="2" size="2" name="mon" class="step1" value=""/>-<input type="text" maxlength="4" size="4" name="year" class="step1" value=""/>&nbsp;дд-мм-гггг&nbsp;&nbsp;<input type="text" maxlength="2" size="2" name="hh" class="step1" value=""/>-<input type="text" maxlength="2" size="2" name="mm" class="step1" value=""/>&nbsp;чч-мм<br /></div>
    
    </div>
    <div id = "cont_reg_right" >
        <div id = "cont_reg_order_btn">
                        
                        <input type="submit"  onmouseover="this.style.color='#CCCCCC'" onmouseout="this.style.color='#FFFFFF'" value="Отправить заказ"   class="submit2"/>
                        </div>
        
    </div>
  </form>  
</div>
<script language="JavaScript" type="text/javascript">
	document.write('<input type="hidden" name=scr_width  value="' + screen.width  +'">');
	document.write('<input type="hidden" name=scr_height value="' + screen.height +'">');
</script>

</form>
<br>