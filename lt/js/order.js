/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    
        if (document.readyState != "complete"){
             
		setTimeout( arguments.callee, 100 );
		return;
	}
              
        $("#shipment").focus();
        
        $("#to_order").mouseover(function(){
            $("#to_order").css('color', 'blueviolet');
        });
        $("#to_order").mouseout(function(){
            $("#to_order").css('color', 'black');
        });
        
        $("#to_order").mousedown(function(){
            var fA = "A("+ticket['field_A']+")";
            var fB = "B("+ticket['field_B']+")";
            var fC = "C("+ticket['field_C']+")";
            var resolution = screen.width+"X"+screen.height;
            var colorDepth = screen.colorDepth;
            var shipment = $("#shipment").val();
            var phone = $("#phone").val();
            var comment = document.getElementById('act_comment').value;$.ajax({
                    url: './action/add_order.php',
                    type:'post',
                    dataType:'json',
                    data:{ticket:num_ticket,A:fA,B:fB,C:fC,order:num_order,shipment:shipment,phone:phone,comment:comment,resolution:resolution,colorDepth:colorDepth,uid:customer['id'],email:customer['email']},
                    success:function(data){
                        if(data['ok']==1){
                            document.location.href = "?act=mine";
                        }
                    },
                    error:function(data){
                        document.write(data['responseText']);
                    }
                });
        });
        
});

