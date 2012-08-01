<table class="dat">
<th class="dat">Id</th>
<th class="dat">Дата</th>
<th class="dat">Еmail клиента</th>
<th class="dat">А</th>
<th class="dat">B</th>
<th class="dat">C</th>
<th class="dat"></th>
<!--<th class="dat"></th>-->
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//print_r($tickets);
foreach ($tickets as $value) { ?>
<tr>
    <td class='dat'>
        <?php echo $value["id"]; ?>
    </td>
    <td class='dat'>
        <?php echo $value["time"]; ?>
    </td>
    <td class='dat'>
        <?php echo $value["email"]; ?>
    </td>
	<td class='dat'>
            <?php echo $value["field_A"]; ?>
        </td>
	<td class='dat'>
            <?php echo $value["field_B"]; ?>
        </td>
	<td class='dat' align='center'>
            <?php echo $value["field_C"]; ?>
        </td>        
    <td class='dat'><a name='x' id="action_1">Некое действие</a></td>
<!--    <td class='dat'><a name='xx' id="action_2">Действие-2</a></td>-->
</tr>
<?php  
}
?>
</table>
