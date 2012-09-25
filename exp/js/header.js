/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    
    var customer = $("#uid").val();
        
    var prid = $("#pid").val();
    
        var desk = new Array();

    for(var i =0;i<10;i++){
        var rows = new Array();
        for(var n = 0;n<10;n++){
            rows.push({dis:true,weight:(n+1)});
        }
        desk.push(rows);
    } 
    
    var A_array = new Array();
        
    var B_array = new Array();

    var C_array = new Array();

    var check_B = new Array(0,0,0,0,0,0,0,0,0);

    var check_C = new Array(0,0,0,0,0,0,0,0,0);
    
    countCart(customer);
    
//    $("div").css('outline','1px solid red');
    
     $("#yor_account, #go_reg, #hb").css({'text-decoration':'underline','cursor':'pointer'});
     
     $("#go_reg").css({'color':'#330000'}); 
     
     $("#hb").attr('title','На главную');
     
     $("#hb").mousedown(function(){
         document.location.href='index.php?act=look';
     });
     
     $("#go_reg").mousedown(function(){
         document.location.href='index.php?act=regs';
     });
     
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
                if(data['ok']!= 'NULL'){
                    $("#fav_g > tbody").append('<tr><td><a href="index.php?act=look&page=1&pid='+prid+'">'+data['fav']['comment']+'</a></td></tr>');
                }
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
            data:{uid:customer,pid:prid},
            success:function(data){
                var prices = data['prices'];
                
                setCartInfo(data['ok'],prices);  
            },
            error:function(data){
                document.write(data['responseText']);
            }
        });
    }
    
    function setCartInfo(count,prices){
        
            var pid = 2;
            
            $.each(prices, function(){
                if(this['pid']!=prid){
                    pid = this['pid'];
                }
            });
            if(count == 0 && prices.length ==0){
                $("#cart_info").remove();
                $("#busket").append("<p style='color:#878787'> Смотреть билет. </p>");
            } 
            if(count > 0 && prices.length == 0){
                $("#cart_info").text("Смотреть билет.").attr('href',"index.php?act=order&type=2");
            } 
            if(count == 0 && prices.length >0){
                $("#cart_info").text("Смотреть билет.").attr('href',"index.php?act=order&type=2&pid="+pid);
            }
            if(count > 0 && prices.length >0){
                $("#cart_info").text("Смотреть билеты.");
            }
       return false;         
            
    }
    
        $("#good_luck").mousedown(function(){
        var ct = $("#cart_info").text(); 
        if(!ct){
            goodLuck(prid);
        }else{
            if(confirm("Корзина не пуста, если продолжить даные будут заменены!")){
                goodLuck(prid);
            }
        }      
    });
    
            
   function goodLuck(pid){
        
        var r,c,num;
        var point;
        var str = '';
        
        while(A_array.length<5){
            r = Math.floor(Math.random()*9);
            c = Math.floor(Math.random()*9);
            num = 10*r+c+1;
            point = {weight:num,row:r,cell:c};
            if(desk[r][c]['dis']){
                A_array.push(point);
                $.each(desk[r],function(){
                    this['dis']=false;
                });
            }
            
        }
        if(A_array.length == 5 && B_array.length < 10){
            $.each(desk,function(){
                $.each(this,function(){
                    this['dis']=true;
                });
            });
            $.each(A_array,function(){
                desk[this['row']][this['cell']]['dis']=false;
            });
             while(B_array.length<10){
                r = Math.floor(Math.random()*9);
                c = Math.floor(Math.random()*9);
                num = 10*r+c+1;
                point = {weight:num,row:r,cell:c};
                if(desk[r][c]['dis'] && check_B[r] < 2){
                    check_B[r]++
                    B_array.push(point);
                    desk[r][c]['dis'] = false;
                }
                if(check_B[r] == 2){
                    $.each(desk[r],function(){
                        this['dis']=false;
                    });
                }
            }
        }
       
        if(A_array.length == 5 && B_array.length == 10 && C_array.length < 15){
            $.each(desk,function(){
                $.each(this,function(){
                    this['dis']=true;
                });
            });
            $.each(A_array,function(){
                desk[this['row']][this['cell']]['dis']=false;
            });
            $.each(B_array,function(){
                desk[this['row']][this['cell']]['dis']=false;
            });
             while(C_array.length<15){
                r = Math.floor(Math.random()*8);
                c = Math.floor(Math.random()*9);
                num = 10*(r)+c+1;
                point = {weight:num,row:r,cell:c};
                if(desk[r][c]['dis'] && check_C[r] < 3){
                    check_C[r]++
                    C_array.push(point);
                    desk[r][c]['dis'] = false;
                }
                if(check_C[r] == 3){
                    $.each(desk[r],function(){
                        this['dis']=false;
                    });
                }
            }
        }
        if(A_array.length == 5 && B_array.length == 10 && C_array.length == 15){ 
            $.each(A_array,function(){
                var a = this.weight;
                if(a<10){
                    a = "0"+a;
                }
                str += ":a"+a;
            });
            $.each(B_array,function(){
                var a = this.weight;
                if(a<10){
                    a = "0"+a;
                }
                str += ":b"+a;
            });
            $.each(C_array,function(){
                var a = this.weight;
                if(a<10){
                    a = "0"+a;
                }
                str += ":c"+a;
            });
            str = str.substr(1);
            $.ajax({
                url:'./action/add_good_luck.php',
                type:'post',
                dataType:'json', 
                data:{pid:pid,uid:customer,artikuls:str},
                success:function(data){ 
                   if(data['ok']==30){
                       document.location.href = "?act=order&type=2"
                   }
                },
                error:function(data){
                    document.write(data['responseText']);
                }
            });
        }
    }
});

