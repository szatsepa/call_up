<script type="text/javascript">
    var order = <?php echo intval($_GET[ticket]);?>;
    var deys = <?php echo date(t);?>;
    var low_y =<?php echo date(L);?>; 
</script>
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
                <input id="edit_order" type="button" value="Редактировать" class="submit2" />
            </td>
            <td class="btp">
                <input  id="delete_order" type='button'value='Удалить'  class="submit2" />
            </td>
        </tr>
    </tbody>
</table>
<br />

<?php 

$price = 2;

include 'dsp_ticket.php';

?>

<br />
<div class = "cont_reg">
<div id = "cont_reg_left">
                    <br/>
                    <br/>
                    <br/>

                    <div id = "cont_reg_left_3">E-mail: </div>
                    <div id = "cont_reg_left_4">
                        <input type="text" required id="to_email"  onblur="return isEmailCorrect()" name="e_mail" size="30" value="<?php echo $_SESSION[user]->data[email];?>"/>
                    </div>
                    <div id = "cont_reg_left_3">Адрес доставки: </div>
                    <div id = "cont_reg_left_66"><textarea rows="3" id="to_shipment" cols="29" name="adress"><?php echo $_SESSION[user]->data[shipping_address];?></textarea></div>
                    <div id = "cont_reg_left_3">Пожелания заказчика: </div>
                    <div id = "cont_reg_left_66"><textarea rows="3" id="desire" cols="29" name="desire"></textarea></div>
                    <div id = "cont_reg_left_3">Метка: </div>
                    <div id = "cont_reg_left_4"><input id="marck" type="text" name="mark" size="30"/></div>
                    <div id = "cont_reg_left_3">Отсрочить до: </div>
                    <div id = "cont_reg_left_4" >
                       <select id="dey" name="day" class="step1">
                        
                            </select>
-
                            <select id="month" name="mon" class="step1">
                      
                            </select>
                        -
                        <select id="year" name="year" class="step1">
<!--                            <option value="<?php echo date(Y);?>" selected><?php echo date(Y);?></option>-->
                         </select>
                        
                        &nbsp;дд-мм-гггг&nbsp;&nbsp;
                        <select id="hh" name="hh" class="step1">
                         
                            </select>
                        -
                        <select id="mm" name="mm" class="step1">
                          
                            </select>
                        &nbsp;чч-мм
                        <br />
                    </div>
    
    </div>
    <div id = "cont_reg_right" >
        <div id = "cont_reg_order_btn">
                        
                        <input id="orderonosets" type="button" value="Отправить заказ"   class="submit2" /> 
                        </div>
        
    </div>
</div>
<br>