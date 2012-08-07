/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    
        if (document.readyState != "complete"){
             
		setTimeout( arguments.callee, 100 );
		return;
	}
        
        var now = new Date();
        
        $("#order_title").text("Заказ №"+num_order+" от "+now.getDate()+" "+month[now.getMonth()]+" "+now.getFullYear()+" г.");
        
        $("#shipment").focus();
        
        $("#to_order").mouseover(function(){
            $("#to_order").css('color', 'blueviolet');
        });
        $("#to_order").mouseout(function(){
            $("#to_order").css('color', 'black');
        });
        
        $("#to_order").mousedown(function(){
//            var str = ticket['field_A']+"\n"+ticket['field_B']+"\n"+ticket['field_C'];
            alert("str");
        });
        
});

