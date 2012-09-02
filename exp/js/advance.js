/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    
    alert("В свете посених заемечеаней эта страница подвегнецца коренной переломке!!!\nКой чего работаит НО еще не все!!!");

    var dt = new Date();
    
    var uid = $("#uid").val();
    
    var month_array = new Array('01','02','03','04','05','06','07','08','09','10','11','12');
    
    var A_array = new Array();
        
    var B_array = new Array();

    var C_array = new Array();
    
    var edit = false;
    
    var olld_simbl = '';
    
//    var artikuls = new Array();
    
    var str_date = dt.getDate()+"-"+month_array[dt.getMonth()]+"-"+dt.getFullYear();
    
    readOrder(window.order); 
    
    firstSelect();
    
    $("#orderonosets").mousedown(function(){
        var email = $("#to_email").val();
        var shipment = document.getElementById("to_shipment").value;
        var desire = document.getElementById("desire").value;
        var mark = $("#marck").val();
        var dey = $("#dey :selected").val();
        var month = $("#month :selected").val();
        var year = $("#year :selected").val();
        var hh = $("#hh :selected").val();
        var mm = $("#mm :selected").val();
        var resolution = screen.width+"X"+screen.height;
        var exe_time = year+"-"+month+"-"+dey+" "+hh+":"+mm;
        var out = {id:window.order,uid:uid,email:email,shipment:shipment,desire:desire,mark:mark,resolution:resolution,exe_time:exe_time};
        console.log(out);
        $.ajax({
           url:'./action/buy_ticket.php',
            type:'post',
            dataType:'json',
            data:out,
            success:function(data){
                console.log(data);
                if(data['ok'] == 30){
                    document.location.href = "?act=private_office";
                }
            },
            error:function(data){
                document.write(data['responseText']);
            }
         
        });
    });
    $("#edit_order").mousedown(function(){ 
        $(".artikul_t").attr('title','Изменить?').css('cursor','pointer');
        edit = !edit;
        if(edit){
          $("#edit_order").css('background-color','green'); 
          
        }else{
          $("#edit_order").css('background-color','#ffcc00');
          $(".artikul_t").removeAttr('title').css('cursor','default');
          $("#new_points").css({'display':'none','z-index':9999});
        }
        
    });
    $(".edit_p").live('click',function(){
        var artikul = this.id;
        var str = this.id;
                str = str.substr(0,1).toUpperCase(); 
                var top=45;
                if(str == 'B'){
                    top=185;
                }else if(str == 'C'){
                    top=395;
                }
                str = 'field_'+str;
                
                var new_num = parseInt(artikul.substr(1));
                var old_num = parseInt(old_simbl.substr(1));   
                
        var out = {field:str,new_artikul:this.id,old_artikul:old_simbl,order:window.order};
//                var out = {simbl:str}
                 console.log(new_num+" out "+old_num);
            $.ajax({
                     url:'./action/edit_ticket.php',
                     type:'post',
                     dataType:'json', 
                     data:out,
                     success:function(data){
                         
                         document.location.href = "?act=advance&ticket="+window.order;
//                            document.location.href = "?act=private_office";
                         console.log(data);
                     },
                     error:function(data){
//                         console.log(data['responseText']);
                         document.write(data['responseText']);
                     } 
                 });
    });
    $(".artikul_t").live('click',function(){
        if(edit){
             
             old_simbl = this.id;
            var str = this.id;
                str = str.substr(0,1).toUpperCase(); 
                var top=45;
                if(str == 'B'){
                    top=185;
                }else if(str == 'C'){
                    top=395;
                }
                var out = {simbl:str}
//                 console.log(out);
                 
                 $.ajax({
                     url:'./query/simbl_list.php',
                     type:'post',
                     dataType:'json', 
                     data:out,
                     success:function(data){ 
                         $("#new_points").css({'display':'block','z-index':9999,'top':top});
                         $("#simbl_points tbody").empty();
                          var old_index = Math.floor(parseInt(old_simbl.substr(1))/10);
                         for(var i = 0;i<9;i++){
                             var row = true;
                             
                             $.each(eval(str+"_array"),function(){
                                    var num_index = Math.floor(parseInt(this['artikul'].substr(1))/10);
                                    if(num_index == i && old_index != i){
                                        row = false;
                                    }
                                });
                                
                                  $("#simbl_points tbody").append("<tr><td><input type='image' class='edit_p' id='"+data['simbls'][(i*10)]['artikul']+"' src='../images/goods/"+data['simbls'][(i*10)]['img']+"' width='80' height='80'/></td><td><input type='image' class='edit_p' id='"+data['simbls'][(i*10)+1]['artikul']+"' src='../images/goods/"+data['simbls'][(i*10)+1]['img']+"' width='80' height='80'/></td><td><input type='image' class='edit_p' id='"+data['simbls'][(i*10)+2]['artikul']+"' src='../images/goods/"+data['simbls'][(i*10)+2]['img']+"' width='80' height='80'/></td><td><input type='image' class='edit_p' id='"+data['simbls'][(i*10)+3]['artikul']+"' src='../images/goods/"+data['simbls'][(i*10)+3]['img']+"' width='80' height='80'/></td><td><input type='image' class='edit_p' id='"+data['simbls'][(i*10)+4]['artikul']+"' src='../images/goods/"+data['simbls'][(i*10)+4]['img']+"' width='80' height='80'/></td><td><input type='image' class='edit_p' id='"+data['simbls'][(i*10)+5]['artikul']+"' src='../images/goods/"+data['simbls'][(i*10)+5]['img']+"' width='80' height='80'/></td><td><input type='image' class='edit_p' id='"+data['simbls'][(i*10)+6]['artikul']+"' src='../images/goods/"+data['simbls'][(i*10)+6]['img']+"' width='80' height='80'/></td><td><input type='image' class='edit_p' id='"+data['simbls'][(i*10)+7]['artikul']+"' src='../images/goods/"+data['simbls'][(i*10)+7]['img']+"' width='80' height='80'/></td><td><input type='image' class='edit_p' id='"+data['simbls'][(i*10)+8]['artikul']+"' src='../images/goods/"+data['simbls'][(i*10)+8]['img']+"' width='80' height='80'/></td><td><input type='image' class='edit_p' id='"+data['simbls'][(i*10)+9]['artikul']+"' src='../images/goods/"+data['simbls'][(i*10)+9]['img']+"' width='80' height='80'/></td></tr>");  
                               
                               if(row){  }
                                 
                         } 
                     },
                     error:function(data){
                         document.write(data['responseText']);
                     } 
                 });
        }
    });
    
    $("#delete_order").mousedown(function(){
        var out = {id:window.order};
        console.log(out);
        if(confirm("Действительно удалить?")){
            $.ajax({
                url:'./action/delete_ticket.php',
                type:'post',
                dataType:'json',
                data:out,
                success:function(data){
                    console.log(data);
                    if(data['ok']){
                        document.location.href = "?act=private_office";
                    }
                },
                error:function(data){
                    console.log(data);
                    document.write(data['responseText']);
                }
            });
        }
    });
    function readOrder(order){ 
                   
            $.ajax({ 
                url:'./query/read_order.php',     
                type:'post',
                dataType:'json',
                data:{order:order},
                success:function(data){ 
                    $("#n_ticket").text('Билет № '+data['ok']+' от '+str_date+'г.')
                    if(data['ok']){
                       sortingCart(data['artikuls']); 
                       buildTicket();
                    }
                },
                error:function(data){
                    document.write(data['responseText']); 
                }
            });
            return false;
       }
       
       function sortingCart(cart){
           artikuls = cart;
           var num = 0;
           var simbl = '';
           var weight = ''; 
           var img = '';
           var id = '';
           
           $.each(cart, function(){
               
               simbl = this['simbl'];
               weight = this['artikul'];
               img = this['img'];
               id = this['id'];
               num = weight.substr(1,2);
               
               var obj = {id:id,simbl:simbl,artikul:weight,img:img};
               
               obj = this;
               
               if(simbl == "A"){
                   
                   A_array.push(obj);  
               }
               if(simbl == "B"){
                   B_array.push(obj);
                   
               }
               if(simbl == "C"){
                    
                   C_array.push(obj);
                  
               }
           });
           return false 
       }
       
       function buildTicket(){
           
           var str = '';
           var a = 0;
           
           $.each(A_array, function(){
               str = this['img'];
               $("#TA_"+a).append("<input type='image' class='artikul_t' id='"+this['artikul']+"' alt='"+this['id']+"' src='../images/goods/"+this['img']+"' width='80' height='80' />")
               a++;
//                title='Изменить?'
           });
           a=0;
           $.each(B_array, function(){
               str = this['img'];
               $("#TB_"+a).append("<input type='image' class='artikul_t' id='"+this['artikul']+"' alt='"+this['id']+"' src='../images/goods/"+this['img']+"' width='80' height='80' />")
               a++;
           });
           a=0;
           $.each(C_array, function(){
               str = this['img'];
               $("#TC_"+a).append("<input type='image' class='artikul_t' id='"+this['artikul']+"' alt='"+this['id']+"' src='../images/goods/"+this['img']+"' width='80' height='80' />")
               a++;
           });
           $(".artikul_t").css('cursor','default');
           
           return false;
       } 
       
       function buildSelect(ydt,deys){
           
           var yy = dt.getFullYear();
           var syy = ydt.getFullYear();
                      
           for(var i = yy;i<(yy+3);i++){
               if(syy == i){
                   $("#year").append("<option value='"+i+"' selected>"+i+"</option>");
               }else{
                   $("#year").append("<option value='"+i+"'>"+i+"</option>");
               }
           }
           buildMonthSelect(ydt,deys);
       }
       
       function buildMonthSelect(dt,deys){
           
           var mm = dt.getMonth();
           
          for(var i=0;i<12;i++){ 
               if(mm == i){
                   $("#month").append("<option value='"+month_array[i]+"' selected>"+month_array[i]+"</option>");
               }else{
                   $("#month").append("<option value='"+month_array[i]+"'>"+month_array[i]+"</option>");
               }
           }
           buildDeySellect(dt,deys);
       }
       function buildDeySellect(dt, deys){
          
           var dd = dt.getDate();
           var hh = dt.getHours();
           var minits = dt.getMinutes();
           for(var i=0;i<(31);i++){
               var n = i+1;
               if(n<10){n = "0"+n;}
               if(dd == (i+1)){
                   $("#dey").append("<option value='"+n+"' selected>"+n+"</option>");
               }else{
                   $("#dey").append("<option value='"+n+"'>"+n+"</option>");
               }
           }
           for(i=0;i<24;i++){
               var n = i;
               if(n<10){n = "0"+n;}
               if(hh == i){
                   $("#hh").append("<option value='"+n+"' selected>"+n+"</option>");
               }else{
                   $("#hh").append("<option value='"+n+"'>"+n+"</option>");
               }
           }
           for(i=0;i<60;i+=5){ 
               var n = i;
               if(n<10){n = "0"+n;} 
               if(minits > (i-4) && minits < (i+4)){ 
                   $("#mm").append("<option value='"+n+"' selected>"+n+"</option>");
               }else{
                   $("#mm").append("<option value='"+n+"'>"+n+"</option>");
               }
           }
       }
       function firstSelect(){
           var now = new Date();
           var YY = now.getFullYear();
           var MM = now.getMonth();
           var dayofmonth = 32 - new Date(YY, MM, 32).getDate();
           clearSelect(now,dayofmonth);
       }
       function clearSelect(mdt,mn){ 
           $("#year, #month, #dey").empty();
           buildSelect(mdt,mn);
       }
});
