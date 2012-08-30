<script type="text/javascript">
    var order = <?php echo intval($_GET[ticket]);?>;
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
                        <?php 
                        
                        $day = date(j)+1;
                        $month = date(n);
                        $year = date(Y);
                        
//                        if($day>23){
//                            $day=0;
//                            $month++;
                            
                            if($month>12){
                                $month=1;
                                $year++;
                            }
                            
//                        }
                        ?>
                        <option value="<?php echo $day;?>"><?php echo $day;?></option>
                        <?php
                        for($i = ($day);$i < date(t);$i++){ ?>
                        
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            
                      <?php }
                        
                        ?>
                             
                            </select>
-
                            <select id="month" name="mon" class="step1">
                       <?php 
                        
                        for($i = $month;$i < 13;$i++){ ?>
                        
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            
                      <?php }
                        
                        ?>
                            </select>
                        -
                        <select id="year" name="year" class="step1">
                        <?php 
                        
                        
                        for($i = $year;$i < ($year + 2);$i++){
                            
                            ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            
                            
                            
                      <?php 
                      
                      
                          
                      }
                        
                        ?>
                            </select>
                        
                        &nbsp;дд-мм-гггг&nbsp;&nbsp;
                        <select id="hh" name="hh" class="step1">
                         <option value="<?php echo date(H);?>"><?php echo date(H);?></option>   
                            
                        <?php 
                        for($i = 0;$i < 25;$i++){ 
                            
                            $hh = "$i";
                            
                            if($i < 10)$hh = "0$i";
                            ?>
                        
                            <option value="<?php echo $hh;?>"><?php echo $hh;?></option>
                            
                      <?php }
                        
                        ?>
                            </select>
                        -
                        <select id="mm" name="mm" class="step1">
                            
                            <option value="<?php echo date(i);?>"><?php echo date(i);?></option>
                        <?php 
                        for($i = 0;$i < 60;$i+=5){ 
                            
                            $mm = "$i";
                            
                            if($i < 10)$mm = "0$i";
                            ?>
                        
                            <option value="<?php echo $mm;?>"><?php echo $mm;?></option>
                            
                      <?php }
                        
                        ?>
                            </select>
                        &nbsp;чч-мм
                        <br />
                    </div>
    
    </div>
    <div id = "cont_reg_right" >
        <div id = "cont_reg_order_btn">
                        
                        <input id="oderonosets" type="button" value="Отправить заказ"   class="submit2" /> 
                        </div>
        
    </div>
</div>
<br>