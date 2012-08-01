<?php

/*
 * created by arcady.1254@gmail.com
 */

//print_r($img_array);
?>
<table width="100%" border="0">
    <tr width="100%" align="center" valign="center">
        <td width="33%" align="center" valign="center">
           <img src="<?php echo $img_array[0][name];?>" alt="<?php echo $img_array[0][name];?>"></img> 
        </td>
        <td width="33%" align="center" valign="center">
           <img src="<?php echo $img_array[1][name];?>" alt="<?php echo $img_array[1][name];?>"></img> 
        </td>
        <td width="33%" align="center" valign="center">
           <img src="<?php echo $img_array[4][name];?>" alt="<?php echo $img_array[4][name];?>"></img> 
        </td>
    </tr>
</table>
<table width="100%" border="0">
    <tr width="100%" align="center" valign="center">
        <td width="50%" align="center" valign="center">
           <img src="<?php echo $img_array[2][name];?>" alt="<?php echo $img_array[2][name];?>" width="480" height="110"></img> 
        </td>
        <td width="50%" align="center" valign="center">
           <img src="<?php echo $img_array[3][name];?>" alt="<?php echo $img_array[3][name];?>" width="480" height="110"></img> 
        </td>
    </tr>
</table>