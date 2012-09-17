/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    
//    alert("В свете посених заемечеаней эта страница подвегнецца коренной переломке!!!\nКой чего работаит НО еще не все!!!");

    var dt = new Date();
    
    var uid = $("#uid").val();
    
    var pid = $("#pid").val();
    
    var position;
    
    var month_array = new Array('01','02','03','04','05','06','07','08','09','10','11','12');
    
    var A_array = new Array();
        
    var B_array = new Array();

    var C_array = new Array();
    
    var S_array = new Array();
    
    var ticket_complite = true;
    
    var edit = false;
    
    var olld_simbl = '';
    
    var str_date = dt.getDate()+"-"+month_array[dt.getMonth()]+"-"+dt.getFullYear();
    
    readOrder(window.order,pid); 
    
    firstSelect();
    
    $("#select_draw").live('change',function(){
        var ch = this.checked;
//        console.log(ch); 
        if(ch){
            $("#d_draw").append('<input type="text" id="draw" maxlength="8" size="9" placeholder="Тираж"/>');
        }else{
            $("#d_draw").empty().html('<label><input type="checkbox" id="select_draw" value="1"><span>&nbsp;&nbsp;&nbspВыбрать любой тираж.&nbsp;&nbsp;&nbsp</span></label>');
        }
    });
    
    $("#orderonosets").mousedown(function(){
//        var email = $("#to_email").val();
//        var shipment = document.getElementById("to_shipment").value;
        var desire = document.getElementById("desire").value;
        var mark = $("#marck").val();
        var dey = $("#dey :selected").val();
        var month = $("#month :selected").val();
        var year = $("#year :selected").val();
        var hh = $("#hh :selected").val();
        var mm = $("#mm :selected").val();
        var resolution = screen.width+"X"+screen.height;
        var exe_time = year+"-"+month+"-"+dey+" "+hh+":"+mm;
        var out = {pid:pid,id:window.order,uid:uid,desire:desire,mark:mark,resolution:resolution,exe_time:exe_time};
//console.log(out);  
        $.ajax({
           url:'./action/buy_ticket.php',
            type:'post',
            dataType:'json',
            data:out,
            success:function(data){
//                console.log(data['simbls']);
                console.log(data['query']);
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
                
                var new_num = parseInt(artikul.substr(1));
                var old_num = parseInt(old_simbl.substr(1)); 
                
                var new_min = (Math.floor((new_num-1)/10))*10+1;
                var new_max = new_min+9;
                
                
                var count_1 = 0;
                
                var count_2 = 0;
                
                var count_3 = 0;
                
                var num = 0;
                
                var simbl = artikul.substr(0,1).toUpperCase();
                
                var lim = 1;
                
                if(simbl == 'B'){
                    lim = 2;
                }else if(simbl == 'C'){
                    lim = 3;
                }
                
                var nu_sho = false;
                
                var n = 0;
                
                var row = 1;
                
                if((15/position)>=1 && (15/position)<1.4){
                    row = 3;
                }else if((15/position)>1.4 && (15/position) < 3){
                    row = 2;
                }


                        $.each(eval(simbl+"_array"),function(){

                            num = parseInt(this['artikul'].substr(1));
                            
                                if(row == 1){
                                    if(num >= new_min && num <= new_max){

                                        count_1++;
                                        if(count_1 == lim){
                                            nu_sho = true;
                                            return false;

                                        }
                                    }

                                }
                                if(row == 2){
                                    if(num >= new_min && num <= new_max){

                                        count_2++;

                                    }
                                    if(count_2 == lim){

                                            nu_sho = true;
                                            return false;
                                    }
                                }
                                if(row == 3){
                                    if(num >= new_min && num <= new_max){ 

                                        count_3++;

                                    }
                                    if(count_3 == lim){

                                            nu_sho = true;
                                            return false;
                                    }
                                }
                          if(this['artikul'].length > 3){
                                nu_sho = false;
                                return false;
                            } 
                            n++;
                        });
                         
                
                
//                console.log("; POS "+position+" ROW "+row+";  m "+new_min+"; new "+new_num+"; M "+new_max+"; C1 "+count_1+"; C2 "+count_2+"; C3 "+count_3);           
                
                if(nu_sho){
                     
                    alert("В этой строке уже выбрано возможное число символов!");
                    return false; 
                }
                
                str = 'field_'+simbl;
                
//               console.log(new_num);
               
            var out = {position:position,pid:pid,field:str,new_artikul:this.id,old_artikul:old_simbl,order:window.order};
//            console.log(out);
            $.ajax({
                     url:'./action/edit_ticket.php', 
                     type:'post',
                     dataType:'json', 
                     data:out,
                     success:function(data){
//                         console.log(data);
                         document.location.href = "?act=advance&ticket="+window.order+"&pid="+pid;
                         
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
                position = this.alt;
                position = parseInt(position.substr(1));
//                console.log(position);
                var out = {pid:pid,simbl:str};
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
//                         var row_str = 'ALL ';
                         var tmp_1_arr = new Array(); 
                         $.each($("#simbl_points tbody tr"),function(){
                             var id = this.id;
                             var num = parseInt(id);
                             for(var i=0;i<10;i++){ 
                                 var u = data['simbls'][num*10+i]['artikul'].substr(1, 2);
                                 
                                   $("#"+id).append("<td id='"+u+"_c'><input type='image'  class='edit_p' id='"+data['simbls'][num*10+i]['artikul']+"' src='../images/goods/"+data['simbls'][num*10+i]['img']+"' width='80' height='80'/></td>");
                               tmp_1_arr.push(data['simbls'][num*10+i]['artikul']);
//                               row_str +=  u+";";
                             }
//                            row_str +=  "\n";
                         });
                         var tmp_arr = new Array();
//                         var m = "DELL ";
                         $.each(S_array,function(){
                             
                             var num_a = this;
                             
                                 $("#"+num_a+"_c").empty();
                                 tmp_arr.push(this);
//                             
//                             m += this+";"; 
                         });
//                         var sm = "c09";
//                         var nm = parseInt(sm.substr(1, 2));
                          
                     },
                     error:function(data){
                         document.write(data['responseText']);
                     } 
                 });
        }
    });
    
    $("#delete_order").mousedown(function(){
        var out = {pid:pid,id:window.order};
        
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
    function readOrder(order,pid){ 
                   
            $.ajax({ 
                url:'./query/read_order.php',     
                type:'post',
                dataType:'json',
                data:{pid:pid,order:order},
                success:function(data){ 
//                    console.log(data['artikuls']);  
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
               if(weight.length > 3){
                   ticket_complite=false;
               }
               
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
           
//           console.log("ticket_C "+ticket_complite);
           
           if(!ticket_complite){
               
               edit = !edit;
               
               $(".artikul_t").attr('title','Изменить?').css('cursor','pointer');
               
               $("#edit_order").css('background-color','green');
                
               $("#orderonosets").remove();
            }
           
       
            $.each(A_array,function(){
                S_array.push(this['artikul'].substr(1, 2));
            });
            $.each(B_array,function(){
                S_array.push(this['artikul'].substr(1, 2));
            });
            $.each(C_array,function(){
                S_array.push(this['artikul'].substr(1, 2));
});

           return false 
       }
       
       function buildTicket(){
           
//           var str = '';
           var a = 0;
           
           $.each(A_array, function(){
//               str = this['img'];
               $("#TA_"+a).append("<input type='image' class='artikul_t' id='"+this['artikul']+"' alt='a"+a+"' src='../images/goods/"+this['img']+"' width='80' height='80' />")
               a++;
//                title='Изменить?'
           });
           a=0;
           $.each(B_array, function(){  
//               str = this['img'];
               $("#TB_"+a).append("<input type='image' class='artikul_t' id='"+this['artikul']+"' alt='b"+a+"' src='../images/goods/"+this['img']+"' width='80' height='80' />")
               a++;
           });
           a=0;
           $.each(C_array, function(){
//               str = this['img'];
               $("#TC_"+a).append("<input type='image' class='artikul_t' id='"+this['artikul']+"' alt='c"+a+"' src='../images/goods/"+this['img']+"' width='80' height='80' />")
               a++;
           });
           $(".artikul_t").css('cursor','pointer'); 
           
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
