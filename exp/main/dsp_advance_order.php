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
            <td class="btp">
                <input  id="luck" type='button' value='Good Luck'  class="advansed" title=""/>
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
        <input type="hidden" id="ticket_no" value="<?php echo $attributes[ticket];?>"/>
        <br/>
        <br/>
        <br/>
        <div id = "cont_reg_left_4">
            <p><strong>Окончание регистрации на актуальный розыгрыш: <?php echo $str_next_draw;?> г. 23:59</strong></p>
            <p id="vi_l"></p>
        </div>
<!--        <div id = "cont_reg_left_3">Пожелания заказчика: </div>-->
        <div id = "cont_reg_left_66">
            <p>Пожелания заказчика: </p>
            <textarea rows="3" id="desire" cols="29" name="desire"></textarea>
        </div>
<!--        <div id = "cont_reg_left_3">Метка: </div>-->
        <div id = "cont_reg_left_4">
            <p>Метка: </p>
            <input id="marck" type="text" name="mark" size="30"/>
        </div>
<!--        <div id = "cont_reg_left_3">Отсрочить до: </div>-->
        <div id = "cont_reg_left_4" >
            <p>Отсрочить до: </p>
            <select class="date_select" id="dey" name="day"></select>
            -
            <select class="date_select" id="month" name="mon"></select>
            -
            <select class="date_select" id="year" name="year"></select>

            &nbsp;дд-мм-гггг&nbsp;&nbsp;
            <select class="date_select" id="hh" name="hh"></select>
            -
            <select class="date_select" id="mm" name="mm"></select>
            &nbsp;чч-мм
            <br /> 
        </div>
        <div id = "cont_reg_left_4">
            <p>Тираж:&nbsp;&nbsp;&nbsp;</p>
            
                    <p id="d_draw"><label><input type="checkbox" id="select_draw" value="1"> 
                    <span>&nbsp;&nbsp;&nbsp;Выбрать любой тираж.&nbsp;&nbsp;&nbsp;</span></label></p>
<!--            <div style="position: relative;float: left;"></div>-->
        </div>
    </div>
</div>