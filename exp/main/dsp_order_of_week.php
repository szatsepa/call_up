<?php

$days = array('Пн','Вт','Ср','Чт','Пт','Сб','Вс');

$zakaz = array('','','','','','','');

// Счетчик количества заказов по дням недели
$order_count = array(0,0,0,0,0,0,0);

while ($row = mysql_fetch_assoc($qry_zakazweek)) { 
    
    // Ограничим вывод
    $counter = $order_count[$row["weekday"]];
    if ($counter >= 5) continue;
    
    $dsp = '';
    
    if($row["status"] == 1) {
        $status = "<span class='edit2'>Новый</span>";
        $dsp    = "&amp;dsp=decline";
    }
    if($row["status"] == 2) {
        $status = "<span class='edit'>Рассмотрен</span>";
        $dsp    = "&amp;dsp=decline";
    }
    if($row["status"] == 3) $status = "<span class='edit4'>Отменен</span>";
    if($row["status"] == 4) $status = "<span class='edit2'>Проигрыш</span>";
    if($row["status"] == 5) {
        $status = "<span class='edit3'>Выигрыш</span>";
        $dsp    = "&amp;dsp=fin";
    }
    if($row["status"] == 6) $status = "<span class='edit5'>Выполнен</span>"; 
    
    $dat = $zakaz[$row["weekday"]]."<p style='margin-left:5px;margin-top:5px;margin-bottom:10px;margin-right:3px;'><a href='index.php?act=view_arch_order&id=".$row["id"]."'>N".$row["c_number"]."&nbsp;".$row["zakaz_date"]."<br />".$row["price_name"]."</a><br />".$status."</p>";

    $zakaz[$row["weekday"]] = $dat;
    
    // Посчитаем количество заказов на один день
    ++$counter;
    $order_count[$row["weekday"]] = $counter;
    
}

?>                    

<div style="margin-left:5px;">
    <p class="order">Заказы по дням недели:</p>
<table class='cart'>
    <thead>
<?php
foreach ($days as $day) {
?>
<th  class='cart' style="width:10em;"><?php echo $day;?></th>
<?php } ?>
</thead>
<tbody>
<tr>
<?php
foreach ($zakaz as $dat) {
?>
<td class='cart' style="text-align:left;" valign="top"><?php echo $dat;?><br/>&nbsp;</td> 
<?php } ?>
</tr>
</tbody>
</table>
    
    <p><a href="index.php?act=all_orders" class="help" style="text-decoration:underline;">Архив заказов</a></p>
</div>
<!--&nbsp;&nbsp;<a id="good_luck" class="help" style="text-decoration:underline;cursor: pointer" title="Заполнить билет случайным образом!">Good Luck</a>-->