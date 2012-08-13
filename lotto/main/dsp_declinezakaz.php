<div class="bottom_btn_32"> 
<form action="index.php?act=zakaz_accept" method="post" name="decline">
    <input type="Submit"  class="submit22" onclick="this.disabled=true;document.getElementById('failure').style.display='block';return false;" value="Отменить заказ"  onmouseover="this.style.color='#CCCCCC'" onmouseout="this.style.color='#FFFFFF'"/>
    <input type='hidden' name='status' value='3'/>
    <input type="hidden" name="stid" value="<?php echo $attributes[stid];?>"/> 
    <input type="hidden" name="id" value="<?php echo $attributes[id];?>"/>
</div>  
 <div class="bottom_btn_33">  
<!--    <br /><br />-->
<div style="display: none;" id="failure">Причина:&nbsp;
    <input type="text" name="decline_comment" value="" maxlength="255" size="50" onfocus="document.getElementById('real_subm').style.display='inline';"/>
    <input type="submit" class='submit31'  onmouseover="this.style.color='#CCCCCC'" onmouseout="this.style.color='#FFFFFF'"  value="&gt;&gt;" id="real_subm" style="display:none;" onclick="javascript:sendForm(this.form.decline_comment.value,this.form);return false;"/>
<?php if ($attributes[dsp] == 'decline' or $attributes[dsp] == 'fin' ) {
//        echo "<input type='hidden' name='dsp' value='kabinet'>";
}
 ?>
    
</div>
</form>
    
     </div> 
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