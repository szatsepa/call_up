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
        
        $(".style_header").css({height:72});
                
        $("#order_form").css({display:'none'});
        
        $(".orders").mousedown(function(){
            var id = parseInt(this.id);
            $("#order_form").css('display','block');
        });
        
});

