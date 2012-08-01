
<table class="dat">
<th class="dat">Id</th>
<th class="dat">Наименование</th>
<th class="dat"></th>
<th class="dat"></th>

<?php 

while ($row = mysql_fetch_assoc($qry_rubrikator)) { ?>
<tr>
    <td class='dat'><?php echo $row["id"]; ?></td>    
    <td class='dat'><?php echo $row["name"]; ?></td>    
    <td class='dat'><a href='index.php?act=rubrika_edit&id=<?php echo $row["id"]; ?>'>Редакт.</a></td>
    <td class='dat'><a href='index.php?act=rubrika_delete&id=<?php echo $row["id"]; ?>'>Удалить</a></td>
</tr>
<?php  
}
?>
</table>