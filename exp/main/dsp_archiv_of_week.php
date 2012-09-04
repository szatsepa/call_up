<?php

$days = array('Пн','Вт','Ср','Чт','Пт','Сб','Вс');

$zakaz = array('','','','','','','');

// Счетчик количества заказов по дням недели
$order_count = array(0,0,0,0,0,0,0);

//print_r($old_order_array);

$rowcount = count($old_order_array);

if($rowcount == 0){
    ?>
    <script language="javascript">
     alert("Архив заказов пуст.")
    window.location.href = "index.php?act=private_office&stid=2";
       </script> 
    <?php
}


foreach ($old_order_array as $row) {
    
// Ограничим вывод
    $counter = $order_count[$row["weekday"]];
    
//    if ($counter >= 5) continue;
    
    $dsp = '';
    
   if($row["status"] == 6) $status = "<span class='edit5'>Выполнен</span>";
    
    $dat = $zakaz[$row["weekday"]]."<p style='margin-left:2px;margin-top:5px;margin-bottom:10px;margin-right:3px;'><a href='index.php?act=view_arch_order&stid=".$attributes[stid]."&id=".$row["id"]."'>N".$row["c_number"]."<br />".$row["zakaz_date"]."<br />".$row["price_name"]."</a><br />".$status."</p>";

    $zakaz[$row["weekday"]] = $dat;
    
    // Посчитаем количество заказов на один день
    ++$counter;
    $order_count[$row["weekday"]] = $counter;
    
}
//print_r($zakaz);
//echo "<br/>";
?>                    

<div style="margin-left:5px;">
    <p class="order">Заказы по дням недели:</p>
<table class='cart' border="0">
<?php
foreach ($days as $day) {
?>
<th  class='cart' style="width:10em;"><?php echo $day;?></th>
<?php } ?>
<tr>
<?php
foreach ($zakaz as $dat) {
?>
<td class='cart' style="text-align:left;" valign="top"><?php echo $dat;?><br/>&nbsp;</td>
<?php } ?>
</tr>
</table>
    

</div>