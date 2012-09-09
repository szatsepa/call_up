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
        $pid = $value[price_id];
//    print_r($value);
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
                                        $img = $pictyre_array[$pid][$var];
                                        if(strlen($var) > 3){
                                           $img = "no_pic.jpg"; 
                                        }
                                        ?>
                                 <td>
                                    <input class='my_button' alt="<?php echo strlen($var);?>" id='<?php echo $var;?>' name ="<?php echo $artikul_i;?>" type="image" src="main/act_prewiew.php?src=http://call-up.ru/images/goods/<?php echo $img;?>&amp;width=28&amp;height=28" disabled/>
                                    
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
                                        $img = $pictyre_array[$pid][$var];
                                        if(strlen($var) > 3){
                                           $img = "no_pic.jpg"; 
                                        }
                                        ?>
                                 <td>
                                    <input class='my_button' id='<?php echo $var;?>' name ="<?php echo $artikul_i;?>" type="image" src="main/act_prewiew.php?src=http://call-up.ru/images/goods/<?php echo $img;?>&amp;width=28&amp;height=28" disabled/>
                                    
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
                                        $img = $pictyre_array[$pid][$var];
                                        if(strlen($var) > 3){
                                           $img = "no_pic.jpg";
                                        } 
                                        ?>
                                <td>
                                    <input class='my_button' id='<?php echo $var;?>' name ="<?php echo $artikul_i;?>" type="image" src="main/act_prewiew.php?src=http://call-up.ru/images/goods/<?php echo $img;?>&amp;width=28&amp;height=28" disabled/>
                                    
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
                    <td class="btp_create" >
                        
                        <a class="to_cart" id="<?php echo $value[id]."&pid=".$pid;?>" title="Произвести некоторые действия над лотерейным билетом">&nbsp;&nbsp;Оформить!&nbsp;&nbsp;</a>
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