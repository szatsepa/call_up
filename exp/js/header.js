/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    
    var customer = $("#uid").val();
        
    var prid = $("#pid").val();
    
    countCart(customer);
     $("#yor_account").css({'text-decoration':'underline','cursor':'pointer'});
     $("#wallet,#yor_account").mousedown(function(){
         
         document.location.href = "index.php?act=wallet";
     });
    
    $("#check_group").mousedown(function(){
        $.ajax({
            url:'./action/mark_group.php',
            type:'post',
            dataType:'json',
            data:{uid:customer,pid:prid},
            success:function(data){
//                console.log(data);
                if(data['ok']!= 'NULL'){
                    $("#fav_g > tbody").append('<tr><td><a href="index.php?act=look&page=1&pid='+prid+'">'+data['fav']['comment']+'</a></td></tr>');
                }
            },
            error:function(data){
//                console.log(data['responseText']);
            }
        });
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
                    data:out
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
//            var str_product = new Array('число','числа','чисел');
//            var str_out = '';
            
            if(count != 0){
               
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

