/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    
    if (document.readyState != "complete"){
             
		setTimeout( arguments.callee, 100 );
		return; 
	}
    
    var uid = $("#uid").val();
    
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

    $("#good_luck").mousedown(function(){
        var ct = $("#cart_info").text(); 
        if(!ct){
            goodLuck();
        }else{
            if(confirm("Корзина не пуста, если продолжить даные будут заменены!")){
                goodLuck();
            }
        }
        
//         
    });
           
    $("#dele_t").mousedown(function(){
        var id = this.name;
        $.ajax({
            url:'./action/delete_ticket.php',
            type:'post',
            dataType:'json',
            data:{id:id},
            success:function(data){
                if(data['ok'] == 1){
                    document.reload();
                }
            },
            error:function(data){
                document.write(data['responseText']);
            }
        });
    });
    $("#sale_t").mousedown(function(){
        var id = this.name;
        document.location.href = "?act=advance&ticket="+id;
//        
//        var resolution = screen.width+"X"+screen.height;
//        $.ajax({
//           url:'./action/buy_ticket.php',
//            type:'post',
//            dataType:'json',
//            data:{id:id,resolution:resolution},
//            success:function(data){
//                if(data['ok'] == 30){
//                    document.location.href = "?act=private_office";
//                }
//            },
//            error:function(data){
//                document.write(data['responseText']);
//            }
//         
//        });
    });
        
   function goodLuck(){
        
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
                data:{uid:uid,artikuls:str},
                success:function(data){
                   console.log(data['artikuls']); 
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

    
//    console.log(check_C);
});

