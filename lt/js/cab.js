/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    
        if (document.readyState != "complete"){
             
		setTimeout( arguments.callee, 500 );
		return;
	}
        
//        alert(ordelist[0]);
        
        $("#instr").remove();
        
        $(".orders").mousedown(function(){
            var id = parseInt(this.id);
            $.ajax({
                url:'./query/order.php',
                type:'post',
                dataType:'json',
                data:{id:id},
                success:function(data){
//                    var str = '';
//                    for(var i in data){
//                        str += i+" "+data[i]+"\n";
//                        
//                    }
//                    alert(str);
                    if(data['time']){
                       $("#order_form_1").css({'display':'block'});
                       $("#order_title").text('Билет №'+data['num_order']+' от '+data['time']);
                       $("#p_A").text('Поле A     '+data['field_A']);
                       $("#p_B").text('Поле B     '+data['field_B']);
                       $("#p_C").text('Поле C     '+data['field_C']);
                       $("#shipment").val(data['shipment']);
                       $("#phone").val(data['phone']);
//                       $("#act_comment").val(data['act_comment']);
                       document.getElementById('comment').value = data['comments'];
                    }
                },
                error:function(data){
                    document.write(data['responseText']);
                }
            });
            
        });
        $("#to_order").mousedown(function(){
            $("#order_form_1").css({display:'none'});
        });
//        
});

