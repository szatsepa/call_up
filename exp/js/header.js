/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    
    var customer = $("#uid").val();
    
    countCart(customer);
     $("#yor_account").css({'text-decoration':'underline','cursor':'pointer'});
     $("#wallet,#yor_account").mousedown(function(){
         
         document.location.href = "index.php?act=wallet";
     });
    
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
            var str_product = new Array('число','числа','чисел');
            var str_out = '';
            
            if(count != 0){
            
//                if(count > 5 && count < 21){
//
//                    str_out = count+" "+str_product[2];
//
//                }else if(count == '1'){
//
//                    str_out = count+" "+str_product[0]; 
//
//                }else if(count =='2' || count == '3' || count == '4'){
//
//                    str_out = count+" "+str_product[1];
//
//                }else{
//
//                    str_out = count+" "+str_product[2];
//                }
//                
//                str_out = " Ваш билет: "+str_out;
//                
            }
            if(count == 0){
                
                str_out = "   Ваш билет."; 
                
            $("#cart_info").remove();
            $("#busket").append("<p style='color:#878787'> Ваш билет. </p>");
                
            }
            
            $("#cart_info").text("    Ваш билет.");
            
            
         

        return false;         
            
    }
});

