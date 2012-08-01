<form action="index.php?act=zakaz_accept&amp;id=<?php echo $attributes[id].$urladd; ?>" method="post" name="decline"><input type="Submit" value="Отменить заказ" onclick="this.disabled=true;document.getElementById('comment').style.display='block';return false;"><input type='hidden' name='status' value='3'><br /><br />
<div style="display:none;" id="comment">Причина:&nbsp;<input type="text" name="decline_comment" value="" maxlength="255" size="50" onfocus="document.getElementById('real_subm').style.display='inline';"><input type="submit" value="&gt;&gt;" id="real_subm" style="display:none;" onclick="javascript:sendForm(this.form.decline_comment.value,this.form);return false;">
<?php if ($attributes[dsp] == 'decline' or $attributes[dsp] == 'fin' ) {
        echo "<input type='hidden' name='dsp' value='kabinet'>";
}
 ?>
</div>
</form>
<script language="JavaScript">
    function sendForm(dat,forma) {
        dat = dat.replace(/^\s+/, '');
        dat = dat.replace(/\s+$/, ''); 
        if (dat.length > 2) {
            forma.submit();
        } else {
            alert ('Укажите причину отмены заказа.');
        }    
    } 
</script>