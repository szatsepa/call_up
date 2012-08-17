/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    
        if (document.readyState != "complete"){
             
		setTimeout( arguments.callee, 100 );
		return;
	}
        
        var cart = new Object();
        
        if(user['id']){
            $.ajax({
                url:'query/check_cart.php',
                type:'post',
                dataType:'json',
                data:{uid:user['id']},
                success:function(data){
                    cart = data['cart'];
                },
                error:function(data){
                    document.write(data['responseText']);
                }
            });
        }
        
        
});

