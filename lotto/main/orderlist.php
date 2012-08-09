<script type="text/javascript">
    var orderlist = new Array();        

<?php
foreach ($orderlist as $value){
    ?>

    orderlist.push(<?php echo json_encode($value);?>);

<?php
}
?>
    </script>
<div id="orderlist" align="center">
<table border="0" cellpadding="5" cellspacing="10" style="font-size:10pt;" width="70%">
<?php

$rowcount = 1;

//флажок для вывода
$first = 1;

foreach ($orderlist as $row){ 
    
    array_push($orderlist, $row);

		if ($first == 1) echo "<tr>";
         echo "<td><a class='orders' id='".$row["id"]."_O'>Ticket N".$row["id"]." ".$row["zakaz_date"]."&nbsp;&nbsp;".$row["price_name"]."&nbsp;&nbsp;".$row["surname"]."</a></td>";
                
        if ($first != 1) echo "</tr>";
		
		// Переборосим флажок вывода
		if ($first == 1) {
			$first = 0;
		} else {
			$first = 1;
		}
		
    ++$rowcount;
}


?>
</table>
</div>

<div id="order_form_1">
    <div class="o_ti">
        <p id="order_title"></p>
    </div>
    <div>
        
        <div class="all_fields">
            <div class="field_N">
                <p id="p_A"></p>
            </div>
            <div class="field_N">
                <p id="p_B"></p>
            </div>
            <div class="field_N">
                <p id="p_C"></p>
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
                <label>Пожелания:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><textarea id="comment" cols="72" rows="6"></textarea>
            </p>
        </div>
        <div id="o_order">
            <p id="to_order">
                Закрыть
            </p>
        </div>
     </div>    
</div>
