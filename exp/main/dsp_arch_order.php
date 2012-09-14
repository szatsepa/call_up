<?php 

$row = mysql_fetch_assoc($qry_archzakaz);

?>
<script type="text/javascript">
    var order = <?php echo $attributes[id];?>;
</script>
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
	<td class="archzakaz"><?php echo $row[c_number]; ?></td>   
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

include 'dsp_ticket.php';

 
?> 
<br />
</div>

<?php 
  
if ($row["status"] == 2 OR $row["status"] == 1){
    ?>
<div  class="bottom_menu">
    <?php
    include ("dsp_declinezakaz.php");  
    ?>
    </div>
    <?php
}?>
    
 