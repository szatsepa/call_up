<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//print_r($tickets_array);
if($tickets_array){
    foreach ($tickets_array as $value) {
        
    
?>
        <table class="btp" border="1" > 
            <thead class="btp">
                <tr>
                    <td colspan="5">
                        <p><?php echo "Билет №".$value[num_order]." от ".$value[time];?></p>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr class="btp" >
                    <td class="btp" align="center">
                       Поле А 
                    </td>
                    <td class="btp" align="center">
                       Поле В 
                    </td>
                    <td class="btp" align="center"> 
                       Поле С 
                    </td>
                    <td class="btp" >
                        
                    </td>
                    <td class="btp" >
                        
                    </td>
                </tr>
                <tr class="btp" >
                    <td class="btp" >
                       <?php echo $value[field_A];?> 
                    </td>
                    <td class="btp" >
                        <?php echo $value[field_B];?> 
                    </td>
                    <td class="btp" >
                        <?php echo $value[field_C];?>  
                    </td>
                    <td class="btp" >
                        <a class="to_cart" id="dele_t" name="<?php echo $value[id];?>">&nbsp;&nbsp;Удалить&nbsp;&nbsp;</a>
                    </td>
                    <td class="btp" >
                        <a class="to_cart" id="sale_t" name="<?php echo $value[id];?>">&nbsp;&nbsp;Купить&nbsp;&nbsp;</a>
                    </td>
                </tr>
                
            </tbody>
        </table>
<br/>
<?php 
    }
}
?>