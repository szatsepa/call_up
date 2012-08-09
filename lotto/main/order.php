<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script type="text/javascript">
    var num_ticket = <?php echo $attributes['ticket'];?>;
    var num_order = <?php echo $ticket['order'];?>;
    var ticket = <?php echo json_encode($ticket['ticket']);?>;
</script>
<div id="order_form">
    <div class="o_ti">
        <p id="order_title">Заказ №<?php echo $ticket['order']." от ".$ticket['schaz'];?></p>
    </div>
    <div>
        
        <div class="all_fields">
            <div class="field_N">
                <p>Поле A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ticket['ticket']['field_A'];?></p>
            </div>
            <div class="field_N">
                <p>Поле B&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ticket['ticket']['field_B'];?></p>
            </div>
            <div class="field_N">
                <p>Поле C&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ticket['ticket']['field_C'];?></p>
            </div>
        </div>
        
    </div>
    <div class="order_footer">
        <div id="address">
            <p>
                <label>Адрес доставки:&nbsp;&nbsp;&nbsp;</label><input id="shipment" type="text" value="" size="72"/>
            </p>
        </div>
        <div id="o_phone">
            <p>
                <label>Телефон:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input id="phone" type="text" value="" size="72"/>
            </p>
        </div>
        <div id="o_comm">
            <p>
                <label>Пожелания:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><textarea id="act_comment" cols="72" rows="6"></textarea>
            </p>
        </div>
        <div id="o_order">
            <p id="to_order">
                Заказать
            </p>
        </div>
     </div>    
</div>