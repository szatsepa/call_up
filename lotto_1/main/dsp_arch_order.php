<?php 

$row = mysql_fetch_assoc($qry_archzakaz);

?>

<br />
<div style="margin-left:10px;">
    <p class="arh_z">Статус заказа:</p>
    <p class="arh_o"><?php
    if($row["status"] == 1) echo "рассматривается поставщиком";
    if($row["status"] == 2) echo "подтвержден поставщиком";
    if($row["status"] == 3) echo "отменен";
    if($row["status"] == 4) echo "демо-заказ";
    if($row["status"] == 5) echo "отгружен поставщиком";
    if($row["status"] == 6) echo "выполнен";
   
    
    if($row["decline_comment"] != "") { ?>
<!--        <br />-->
        <strong><p class="arh_o">Причина:</p></strong> <?php echo $row["decline_comment"];
    
     }  ?> 
</p> 
<!--<br /><br />-->
<table class="archzakaz">
<tr>
	<td class="archzakaz">N заказа:&nbsp;</td>
	<td class="archzakaz"><?php echo $attributes[id]; ?></td>
</tr>
<tr>
	<td class="archzakaz">Дата, время:&nbsp;</td>
	<td class="archzakaz"><?php echo $row["zakaz_date"]; ?></td>
</tr>
<tr>
	<td class="archzakaz">E-mail менеджера:&nbsp;</td>
	<td class="archzakaz"><?php echo $row["email"]; ?></td>
</tr>
<tr>
	<td class="archzakaz">ИНН:</td>
	<td class="archzakaz"><?php echo $row["contragent_id"]; ?></td>
</tr>
	<td class="archzakaz">Наименование контрагента:</td>
	<td class="archzakaz"><?php echo $row["contragent_name"]; ?></td>
</tr>
<tr>
	<td class="archzakaz">Условия доставки:</td>
	<td class="archzakaz"><?php echo $row["shipment"]; ?></td>
</tr>
<tr>
	<td class="archzakaz">Комментарии:</td>
	<td class="archzakaz"><?php echo $row["comments"]; ?></td>
</tr>
<tr>
	<td class="archzakaz">Отсрочить до:&nbsp;</td>
	<td class="archzakaz"><?php echo $row["exe_date"]; ?></td>
</tr>
</table>

<br />
<?php
// Выводим корзину архивного заказа

$num_rows	=	mysql_numrows($qry_archgoods);
$num_fields	=	mysql_num_fields($qry_archgoods);

$field_count	=	0;

$array_fields = array();

while ($field_count < $num_fields) {

	$array_fields[$field_count] = mysql_field_name($qry_archgoods, $field_count);
	++$field_count;
}

$fields = array ("Наименование","Цена ед.","Кол-во (шт.)","Скидка");
echo "<table class='cart' border='0'>";

// Выводим заголовок таблицы
$th = 0;
while ($th < count($fields)) {
    echo "<th class='cart'>".$fields[$th]."</th>";
	++$th;
}

while ($row_count < $num_rows) {
	echo "<tr>";	
	$field_count 	= 	0;	
	while ($field_count < $num_fields) {
        $dat = mysql_result($qry_archgoods,$row_count,$array_fields[$field_count]);
	    echo "<td class='cart'>".$dat."</td>";        			
		++$field_count;
	} 
	echo "</tr>";
    
    $single_price = mysql_result($qry_archgoods,$row_count,$array_fields[1]);
    $amount       = mysql_result($qry_archgoods,$row_count,$array_fields[2]);
    
	if ($amount == 0) {
	
		echo "<tr><td colspan='4'><strong>Внимание, позиция была удалена поставщиком!</strong></td></tr>";
	
	}
	
    $total += $single_price*$amount;
       
	++$row_count;
}

echo"<tr><td colspan='3'>&nbsp;</td><td class='cart'>Итого: ".$total."руб. </td></tr>";
echo "</table>";

if (!isset($attributes[zakaz])) { 
?>
<br />
</div>
<div  class="bottom_menu">
<?php if ($total > 0) {?>
    <div class="bottom_btn_31">
<form action="index.php?act=create_similar&amp;id=<?php echo $attributes[id].'&amp;stid='.$attributes[stid]; ?>" method="post"><input type="Submit" onmouseover="this.style.color='#CCCCCC'" onmouseout="this.style.color='#FFFFFF'" value="Сформировать похожий заказ сейчас"   class="submit22"/></form><?php } ?>
</div>
&nbsp;


<?php 
   
if ($row["status"] == 2){
    include ("dsp_declinezakaz.php");  
}
} 
if (isset($attributes[dsp]) and $attributes[dsp] == 'accept') {?>
<br /><form action="index.php?act=zakaz_accept&amp;id=<?php echo $attributes[id].'&amp;stid='.$attributes[stid]; ?>" method="post"><input type="Submit" value="Подтвердить заказ" ><input type='hidden' name='status' value='2'></form>&nbsp;<?php include ("dsp_declinezakaz.php"); ?>
<?php } 
if (isset($attributes[dsp]) and $attributes[dsp] == 'accepted') {?>
<br /><form action="index.php?act=zakaz_accept&amp;id=<?php echo $attributes[id].'&amp;stid='.$attributes[stid]; ?>" method="post"><input type="Submit" value="Заказ отгружен" ><input type='hidden' name='status' value='5'></form>&nbsp;<?php include ("dsp_declinezakaz.php"); ?>
<?php }
if ($row["status"] == 5) {?>
&nbsp;
<div class="bottom_btn_32">
<form action="index.php?act=zakaz_accept&amp;id=<?php echo $attributes[id]; ?>" method="post"><input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/><input type="Submit"  onmouseover="this.style.color='#CCCCCC'" onmouseout="this.style.color='#FFFFFF'" value="Заказ выполнен" class="submit22"/><input type='hidden' name='status' value='6'/><input type='hidden' name='dsp' value='kabinet'/></form>
</div>
<?php }
if (isset($attributes[dsp]) and $attributes[dsp] == 'shipped') {?>
<br /><?php include ("dsp_declinezakaz.php"); ?>
<?php } ?>
</div>