/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    
//    alert("В свете посених заемечеаней эта страница подвегнецца коренной переломке!!!\nКой чего работаит НО еще не все!!!");

    var dt = new Date();
    
    var uid = $("#uid").val();
    
    var month_array = new Array('01','02','03','04','05','06','07','08','09','10','11','12');
    
    var A_array = new Array();
        
    var B_array = new Array();

    var C_array = new Array();
    
    var S_array = new Array();
    
    var edit = false;
    
    var olld_simbl = '';
    
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

        $.ajax({
           url:'./action/buy_ticket.php',
            type:'post',
            dataType:'json',
            data:out,
            success:function(data){
                
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
        
//        var tmp = '';
        
                var artikul = this.id;
                var str = this.id;
                str = str.substr(0,1).toUpperCase(); 
                
                var new_num = parseInt(artikul.substr(1));
                var old_num = parseInt(old_simbl.substr(1)); 
                
                var new_min = (Math.floor(new_num/10))*10+1;
                var new_max = new_min+9;
                
                var count = 0;
                
                tmp = "A "+artikul+" S "+old_simbl+" m "+new_min+" "+new_num+" "+new_max+" M ";
                
                $.each(eval(artikul.substr(0,1).toUpperCase()+"_array"),function(){
                    var num = parseInt(this['artikul'].substr(1));
                    if(num >= new_min && num <= new_max){
                        count++;
                    }
                });
                
                var nu_sho = false;

                if(str == 'A' && count == 1){

                        nu_sho = true;
                }else if(str == 'B' && count == 2){
                        nu_sho = true;
                }else if(str == 'C' && count == 3){
                        nu_sho = true;
                }
                
                if(nu_sho){
                    alert("В этой строке уже выбрано возможное число символов!");
                    return false; 
                }
                
                str = 'field_'+str;
                
               console.log(tmp);
               
            var out = {field:str,new_artikul:this.id,old_artikul:old_simbl,order:window.order};
            
            $.ajax({
                     url:'./action/edit_ticket.php',
                     type:'post',
                     dataType:'json', 
                     data:out,
                     success:function(data){
                         
                         document.location.href = "?act=advance&ticket="+window.order;
                         
                     },
                     error:function(data){
                         
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
                var out = {simbl:str};
                 $.ajax({
                     url:'./query/simbl_list.php',
                     type:'post',
                     dataType:'json', 
                     data:out,
                     success:function(data){ 
                         $("#new_points").css({'display':'block','z-index':9999,'top':top});
                         $("#simbl_points tbody").empty();
                         
                         for(var i = 0;i<9;i++){
                                    $("#simbl_points tbody").append("<tr id='"+i+"_r'></tr>");   
                          } 
                         var row_str = 'ALL ';
                         var tmp_1_arr = new Array(); 
                         $.each($("#simbl_points tbody tr"),function(){
                             var id = this.id;
                             var num = parseInt(id);
                             for(var i=0;i<10;i++){ 
                                 var u = data['simbls'][num*10+i]['artikul'].substr(1, 2);
                                 
                                   $("#"+id).append("<td id='"+u+"_c'><input type='image'  class='edit_p' id='"+data['simbls'][num*10+i]['artikul']+"' src='../images/goods/"+data['simbls'][num*10+i]['img']+"' width='80' height='80'/></td>");
                               tmp_1_arr.push(data['simbls'][num*10+i]['artikul']);
                               row_str +=  u+";";
                             }
                            row_str +=  "\n";
                         });
                         var tmp_arr = new Array();
                         var m = "DELL ";
                         $.each(S_array,function(){
                             
                             var num_a = this;
                             
                                 $("#"+num_a+"_c").empty();
                                 tmp_arr.push(this);
//                             
                             m += this+";"; 
                         });
                         var sm = "c09";
                         var nm = parseInt(sm.substr(1, 2));
//                         console.log(nm);
//                         console.log(m);
//                         console.log(row_str);
//                         console.log(S_array);
                          
                     },
                     error:function(data){
                         document.write(data['responseText']);
                     } 
                 });
        }
    });
    
    $("#delete_order").mousedown(function(){
        var out = {id:window.order};
//        console.log(out);
        if(confirm("Действительно удалить?")){ 
            $.ajax({
                url:'./action/delete_ticket.php',
                type:'post',
                dataType:'json',
                data:out,
                success:function(data){
//                    console.log(data);
                    if(data['ok']){
                        document.location.href = "?act=private_office";
                    }
                },
                error:function(data){
//                    console.log(data);
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
           
//           S_array = A_array.concat(B_array,C_array);
$.each(A_array,function(){
    S_array.push(this['artikul'].substr(1, 2));
});
$.each(B_array,function(){
    S_array.push(this['artikul'].substr(1, 2));
});
$.each(C_array,function(){
    S_array.push(this['artikul'].substr(1, 2));
});
//S_array.sort();
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