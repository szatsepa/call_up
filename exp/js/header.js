/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    
    var customer = $("#uid").val();
    
    countCart(customer);
    
     $("#log_in").mousedown(function(){  
               var scr_W = screen.width;
                var scr_H = screen.height;
                var colorDepth = screen.colorDepth;
                var pwd = $("#pwd").val();
                var out = {scr_W:scr_W,scr_H:scr_H,colorDepth:colorDepth,pwd:pwd}
                $.ajax({
                    url: './action/statistics.php',
                    type:'post',
                    dataType:'json',
                    data:out,
                });
                return false;
            });
    
    function countCart(customer){ 
        $.ajax({
            url:'./query/count_in_cart.php',
            type:'post',
            dataType:'json',
            data:{uid:customer},
            success:function(data){
                setCartInfo(data['ok']);
            },
            error:function(data){
                document.write(data['responseText']);
            }
        });
    }
    
    function setCartInfo(count){
            var str_product = new Array('товар','товара','товаров');
            var str_out = '';
            
            if(count != 0){
            
                if(count > 5 && count < 21){

                    str_out = count+" "+str_product[2];

                }else if(count == '1'){

                    str_out = count+" "+str_product[0]; 

                }else if(count =='2' || count == '3' || count == '4'){

                    str_out = count+" "+str_product[1];

                }else{

                    str_out = count+" "+str_product[2];
                }
                
                str_out = " В корзине: "+str_out;
                
            }
            if(count == 0){
                
                str_out = " Корзина пуста. "; 
                
            $("#cart_info").remove();
            $("#busket").append("<p style='color:#878787'> Корзина пуста. </p>");
                
            }
            
            $("#cart_info").text(str_out);
            
            
         

        return false;         
            
    }
});

