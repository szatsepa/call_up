<div align="center">
<table class="dat" border="0" width="1024">
<?php 
while ($row = mysql_fetch_assoc($qry_messages)) { 
    $id      = $row["id"];
    $role    = $row["role"];
    $message = $row["message"];
    
    $status = $row["status"];
    $resurs = $row["resurs"];
    
    if ($status == 1) {
        $checkmessage = "<span class='edit2'>Показывается</span>";
        $checked = 'checked';
    } else {
        $checked = '';
        $checkmessage = " Показывать";
    }
?>
<tr><form action="index.php?act=message_update&amp;id=<?php echo $id; ?>" method="post" name="message_update<?php echo $id; ?>">
    <td>&nbsp;<?php include ("dsp_roleselect.php"); ?><br /><br />    
    <input type="checkbox" name="status" value="1" <?php echo $checked; ?>><?php echo $checkmessage; ?></td>
    <td><textarea name="message" rows="3" cols="80" wrap="virtual"><?php echo $message; ?></textarea>
        <input type="text" name="resurs" size="72" value="<?php echo $resurs;?>"/></td>
    <td><table border="0">
            <tr>
                <td>
                    <input type="submit" value="Обновить"/></form>
                </td>
             </tr>
             <tr>
                 <td>
                     <form action="index.php?act=del_message" method="post">
                         <input type="hidden" name="id" value="<?php echo $id;?>"/>
                        <input type="submit" value="&nbsp;Удалить&nbsp;"/>
                     </form>
                </td>
             </tr>            
        </table>
    </td>
</tr>
<tr><td colspan="3" class="dat">&nbsp;</td></tr>
<?php 
} ?>
</table>
</div>