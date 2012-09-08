<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$n = 0;
if($tickets_array){
    foreach ($tickets_array as $value) {
        $A_array = explode(":", $value[field_A]);
    $B_array = explode(":", $value[field_B]);
    $C_array = explode(":", $value[field_C]);
//    print_r($C_array);
?> 
        <table class="btp" border="1" id="ticket_<?php echo $n;?>"> 
            <thead class="btp">
                <tr>
                    <th colspan="4">
                        <p><?php echo "Билет №".$value[num_order]." от ".$value[time];?></p>
                    </th>
                </tr>
                <tr class="btp" >
                    <th class="btp" align="center">
                       Поле А 
                    </th>
                    <th class="btp" align="center">
                       Поле В 
                    </th>
                    <th class="btp" align="center"> 
                       Поле С 
                    </th>
<!--                    <td class="btp" >
                        
                    </td>-->
                    <th class="btp" >
                        
                    </th>
                </tr>
            </thead>
            <tbody>
                
                <tr class="btp" >
                    <td class="btp" >
                        <table>
                            <tr>
                                <?php
                                    foreach($A_array as $var){ 
                                        if($var == 'NULL')$var = '00';
                                        ?>
                                 <td>
                                    <input class='my_button' id='<?php echo $var;?>' name ="<?php echo $artikul_i;?>" type="image" src="main/act_prewiew.php?src=http://call-up.ru/images/goods/<?php echo $pictyre_array[$var];?>&amp;width=30&amp;height=30" disabled/>
                                    
                                </td>
<?php
                                    }
                                ?> 
                            </tr>
                        </table>
                    </td>
                    <td class="btp" >
                        <table>
                            <tr>
                                <?php
                                    foreach($B_array as $var){ 
                                        if($var == 'NULL')$var = '00';
                                        ?>
                                 <td>
                                    <input class='my_button' id='<?php echo $var;?>' name ="<?php echo $artikul_i;?>" type="image" src="main/act_prewiew.php?src=http://call-up.ru/images/goods/<?php echo $pictyre_array[$var];?>&amp;width=30&amp;height=30" disabled/>
                                    
                                </td>
<?php
                                    }
                                ?> 
                            </tr>
                        </table>
                    </td>
                    <td class="btp" > 
                        <table>
                            <tr>
                                <?php
                                    foreach($C_array as $var){
                                        if($var == 'NULL')$var = '00'; 
                                        ?>
                                <td>
                                    <input class='my_button' id='<?php echo $var;?>' name ="<?php echo $artikul_i;?>" type="image" src="main/act_prewiew.php?src=http://call-up.ru/images/goods/<?php echo $pictyre_array[$var];?>&amp;width=30&amp;height=30" disabled/>
                                    
                                </td>
<?php
                                    }
                                ?> 
                            </tr>
                        </table>  
                    </td>
<!--                    <td class="btp" >
                        <a class="to_cart" id="dele_t" name="<?php echo $value[id];?>">&nbsp;&nbsp;Удалить&nbsp;&nbsp;</a>
                    </td>-->
                    <td class="btp" >
                        <a class="to_cart" id="<?php echo $value[id];?>" title="Произвести некоторые действия над лотерейным билетом">&nbsp;&nbsp;ACTION!!!&nbsp;&nbsp;</a>
                    </td>
                </tr>
                
            </tbody>
        </table>
<br/>
<?php 
$n++; 
    }
}
?>