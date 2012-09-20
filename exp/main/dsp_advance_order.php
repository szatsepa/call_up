<script type="text/javascript">
    var order = <?php echo intval($_GET[ticket]);?>;
</script>
<table class='cart'>
    <tr>
        <td class='cart' style="font-size: 18px; font-weight: bold">
<?php

/*
 * created by arcady.1254@gmail.com
 */
if ($title != '') echo "<br/><h2>".$title."</h2><br/>";

?>
                  </td>
    </tr>
</table>
<!--<br/>&nbsp;-->
<!--width="100"-->
<table class="btp" border="0" >
     
    <tbody>
        <tr>
            <td class="btp">
                <input id="edit_order" type="button" value="Редактировать" class="advansed" />
            </td>
            <td class="btp">
                <input  id="delete_order" type='button' value='Удалить'  class="advansed" />
            </td>
            <td class="btp">
                <input  id="orderonosets" type='button' value='Оформить'  class="advansed" title=""/>
            </td>
        </tr>
    </tbody>
</table>
<br />
 
<?php 
 
$price = 2;

include 'dsp_ticket.php';

?>

<br />
<div class = "cont_reg">
    <div id = "cont_reg_left">
        <br/>
        <br/>
        <br/>
        <div id = "cont_reg_left_3">Пожелания заказчика: </div>
        <div id = "cont_reg_left_66"><textarea rows="3" id="desire" cols="29" name="desire"></textarea></div>
        <div id = "cont_reg_left_3">Метка: </div>
        <div id = "cont_reg_left_4"><input id="marck" type="text" name="mark" size="30"/></div>
        <div id = "cont_reg_left_3">Отсрочить до: </div>
        <div id = "cont_reg_left_4" >
            <select class="date_select" id="dey" name="day" class="step1"></select>
            -
            <select class="date_select" id="month" name="mon" class="step1"></select>
            -
            <select class="date_select" id="year" name="year" class="step1"></select>

            &nbsp;дд-мм-гггг&nbsp;&nbsp;
            <select class="date_select" id="hh" name="hh" class="step1"></select>
            -
            <select class="date_select" id="mm" name="mm" class="step1"></select>
            &nbsp;чч-мм
            <br /> 
        </div>
            <div id = "cont_reg_left_44">
                <div style="position: relative;float: left;">Тираж:&nbsp;&nbsp;&nbsp;</div>
                <div style="position: relative;float: left;">
                        <p id="d_draw"><label><input type="checkbox" id="select_draw" value="1"> 
                        <span>&nbsp;&nbsp;&nbsp;Выбрать любой тираж.&nbsp;&nbsp;&nbsp;</span></label></p>
                </div>
            </div>
    </div>
</div>