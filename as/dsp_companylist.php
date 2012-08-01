<table class="dat">
<th class="dat">Id</th>
<th class="dat">Наименование</th>
<th class="dat">Информация</th>
<th class="dat">ИНН</th>
<th class="dat">Наим. контрагента</th>
<th class="dat">Статус</th>
<th class="dat"></th>
<th class="dat"></th>

<?php 
//$fields = mysql_num_fields($qry_companies);
while ($row = mysql_fetch_assoc($qry_companies)) { ?>
<tr>
    <td class='dat'><?php echo $row["id"]; ?></td>
    <?php if ($row[3] == '') {?>
    <td class='dat'><?php echo $row["name"]; ?></td>
    <?php } else {?>
    <td class='dat'><?php echo $row["about"]; ?> (<a href="../index.php?act=show_company&company_id=<?php echo $row["id"]; ?>" target="_blank">инф.</a>)</td>
    <?php } ?>
    <td class='dat'><?php echo $row["about"]; ?></td>
	<td class='dat'><?php echo $row["inn"]; ?></td>
	<td class='dat'><?php echo $row["contragent"]; ?></td>
	<td class='dat' align='center'><?php 
		if ($row["status"] == 9) {
			echo "Демо";
		} else {
			echo "&nbsp;";
		}
	?></td>        
    <td class='dat'><a href='index.php?act=company_edit&company_id=<?php echo $row["id"]; ?>'>Редакт.</a></td>
    <td class='dat'><a href='index.php?act=company_delete&company_id=<?php echo $row["id"]; ?>'>Удалить</a></td>
</tr>
<?php  
}
?>
</table>