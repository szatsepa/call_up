/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    
    var dt = new Date();
    
    var uid = $("#uid").val();
    
    var pid = $("#pid").val();
    
    var tid = $("#ticket_no").val();
    
    var num_order;
    
    var position;
    
    var month_array = new Array('01','02','03','04','05','06','07','08','09','10','11','12');
    
    var A_array = new Array();
        
    var B_array = new Array();

    var C_array = new Array();
    
    var S_array = new Array();
    
    var ticket_complite = true;
    
    var edit = false;
    
    var order_ready = false; 
    
    var gl_flag = false;
    
    var str_date = dt.getDate()+"-"+month_array[dt.getMonth()]+"-"+dt.getFullYear();
    
    
    readOrder(window.order,pid); 
    
//    $("div").css({'outline':'1px solid grey'});
    
    firstSelect();
    
    $("#select_draw").live('change',function(){
        var ch = this.checked; 
        if(ch){
            $("#d_draw").append('<input type="text" id="draw" maxlength="8" size="9" placeholder="Тираж"/>');
        }else{
            $("#d_draw").empty().html('<label><input type="checkbox" id="select_draw" value="1"><span>&nbsp;&nbsp;&nbspВыбрать любой тираж.&nbsp;&nbsp;&nbsp</span></label>');
        }
    });
    
    $("#orderonosets").attr('title', 'Билет не заполнен');
    
    $("#orderonosets").mousedown(function(){
        if(order_ready){
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

            $.ajax({
            url:'./action/buy_ticket.php',
                type:'post',
                dataType:'json',
                data:out,
                success:function(data){
//                    console.log(data['query']);
                    if(data['ok'] == 30){ 
                        document.location.href = "?act=private_office";
                    }
                },
                error:function(data){
                    document.write(data['responseText']);
                }

            });
        }else{
            alert("Билет не заполнен!");
        }
        
    });
    
    $("#edit_order").mousedown(function(){ 
        $(".artikul_t").attr('title','Изменить?').css('cursor','pointer');
        edit = !edit;
        if(edit){
          $("#edit_order").css('background-color','#ecfcec'); 
          
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
                         
                if(nu_sho){
                     
                    alert("В этой строке уже выбрано возможное число символов!");
                    return false; 
                }
                
                str = 'field_'+simbl;
               
            var out = {position:position,pid:pid,field:str,new_artikul:this.id,old_artikul:old_simbl,order:window.order};

        $.ajax({
            url:'./action/edit_ticket.php', 
            type:'post',
            dataType:'json', 
            data:out,
            success:function(){
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
                         var tmp_1_arr = new Array(); 
                         $.each($("#simbl_points tbody tr"),function(){
                             var id = this.id;
                             var num = parseInt(id);
                             for(var i=0;i<10;i++){ 
                                 var u = data['simbls'][num*10+i]['artikul'].substr(1, 2);
                                 
                               $("#"+id).append("<td id='"+u+"_c'><input type='image'  class='edit_p' id='"+data['simbls'][num*10+i]['artikul']+"' src='../images/goods/"+data['simbls'][num*10+i]['img']+"' width='80' height='80'/></td>");
                               tmp_1_arr.push(data['simbls'][num*10+i]['artikul']);
                             }
                         });
                         var tmp_arr = new Array();
                         $.each(S_array,function(){
                             
                             var num_a = this;
                             
                                 $("#"+num_a+"_c").empty();
                                 tmp_arr.push(this);
                         });                          
                     },
                     error:function(data){
                         document.write(data['responseText']);
                     } 
                 });
        }
    });
    
    $("#delete_order").mousedown(function(){
        var out = {pid:pid,id:window.order};
        
        if(confirm("Билет будет удален!")){  
            $.ajax({
                url:'./action/delete_ticket.php',
                type:'post',
                dataType:'json',
                data:out,
                success:function(data){
                    if(data['ok']){
                        document.location.href = "?act=private_office";
                    }
                },
                error:function(data){
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
                    $("#n_ticket").text('Билет № '+data['ok']+' от '+str_date+'г.');
                    num_order = data['ok'];
                    if(data['ok']){
                       sortingCart(data['artikuls']);
                       sortingForGoodLuck(data['gl']);
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
           
           if(!ticket_complite){
               
               edit = !edit;
               
               $(".artikul_t").attr('title','Изменить?').css('cursor','pointer');
               
               $("#edit_order").css('background-color','#ecfcec');
                
            }else{
                $("#orderonosets").removeAttr('title'); 
                order_ready = true;
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
           var a = 0;
           
           $.each(A_array, function(){
               $("#TA_"+a).append("<input type='image' class='artikul_t' id='"+this['artikul']+"' alt='a"+a+"' src='../images/goods/"+this['img']+"' width='80' height='80' />")
               a++;
           });
           a=0;
           $.each(B_array, function(){ 
               $("#TB_"+a).append("<input type='image' class='artikul_t' id='"+this['artikul']+"' alt='b"+a+"' src='../images/goods/"+this['img']+"' width='80' height='80' />")
               a++;
           });
           a=0;
           $.each(C_array, function(){
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
       
           
//    sche odyn GoodLuck
//обработка нажатия кнопки GoodLuck
        $("#luck").mousedown(function(){
            
                var array = new Array("A","B","C");
                var obj = new Object();//массивчик из трех объектов а б и ц а тако же свободных позиций

                $.each(array, function(){
// добавить номера в каждое поле по очереди после чего пометить клеточки
                   obj[this] = freeCells(this);
                });
                setFreeCell(obj);
            return false;
        });
       
//массивы полей под сервис счастливый случай
        var AA_array = new Array(false,false,false,false,false);

        var BB_array = new Array(false,false,false,false,false,false,false,false,false,false);

        var CC_array = new Array(false,false,false,false,false,false,false,false,false,false,false,false,false,false,false);
        
        var desk = new Array(89);//виртуальная доска
        //массивы контроля правил игры
        var check_A = {1:0,2:0,3:0,4:0,5:0,6:0,7:0,8:0,9:0};
        
        var check_B = {1:0,2:0,3:0,4:0,5:0,6:0,7:0,8:0,9:0};
         
        var check_C = {1:0,2:0,3:0,4:0,5:0,6:0,7:0,8:0,9:0};
        
        function setFreeCell(obj){//***
            
            var whot = new Object();
            gl_flag = true;
            var pos = obj["A"]['pos'][0];
            var simbl = "A";
            if(pos == undefined){
               pos = obj["B"]['pos'][0];
               simbl = "B";
            }
            if(pos == undefined){
               pos = obj["C"]['pos'][0];
               simbl = "C";
            }
            if(pos == undefined){
               createTicket();
            }else{ 
                while(!whot['whot']){ 
                    whot = getRandomPoint(simbl);

                    if(whot['whot']){
                        eval(simbl+simbl+"_array")[pos]=whot['point'];    
                        checkNum(whot['point']['val'],simbl);
                        obj[simbl] = freeCells(simbl);
//                        console.log(eval('check_'+simbl));
                        if(gl_flag){
                            setNextCell(obj);
                        }
                    }
                }
            }
            
            
        }
       
       function setNextCell(obj){//***
           setFreeCell(obj);
       }
       
       function sortingForGoodLuck(cart){//****
          
            for(var i =1;i<10;i++){
                //ряд виртуальной доски
                var row = new Array();
                for(var n = 1;n<11;n++){
                    var cell = {dis:true};
                    //ячейка вирт доски desk.push(cell);
                    row.push(cell);
                }
                
                desk.push(row);
            } 
//            console.log(desk);           
           var simbl = '';  
            
            for(i = 0;i < 3;i++){
                var num = 0;
                $.each(cart[i], function(){
                    simbl = this.substr(0,1).toUpperCase(); 
                    if(this.length == 3){
                        //заполняем масивы уже выбранными числами из билета при этом имеем в виду что длинна слова равна три (пустое место отличается количеством символов в слове)
                        eval(simbl+simbl+"_array")[num] = {val:this.substr(1),simbl:this.substr(0,1)};
                        //заполняем массив контроля правил игры
                        checkNum(this.substr(1),simbl);
                     }
                num++;
                });
            }
//            использованые ячейки(КЛЕТОЧКИ) доски метим - false
            setDesk();
//            подготовка закончена

            return false;
       }
       
       function checkNum(num,simbl){//***
//           метим в соотв массиве допустимое количество символов из одной строки
// или ряда от первого до последнего
                 if ((num > 0) && (num < 11)){eval('check_'+simbl)['1']++;}
            else if ((num > 10) && (num < 21)){eval('check_'+simbl)['2']++;}
            else if ((num > 20) && (num < 31)){eval('check_'+simbl)['3']++;}			
            else if ((num > 30) && (num < 41)){eval('check_'+simbl)['4']++;}
            else if ((num > 40) && (num < 51)){eval('check_'+simbl)['5']++;}	
            else if ((num > 50) && (num < 61)){eval('check_'+simbl)['6']++;}			
            else if ((num > 60) && (num < 71)){eval('check_'+simbl)['7']++;}
            else if ((num > 70) && (num < 81)){eval('check_'+simbl)['8']++;}
            else if ((num > 80) && (num < 91)){eval('check_'+simbl)['9']++;}
            
            return false;
       }
 
       function freeCells(simbl){//***
           
        var obj = {"A":5,"B":10,"C":15};//количество чисел в поле
        var pos = new Array();//позициi ячейek в соотв поле
        var count=0;
        for(var i = 0;i<obj[simbl];i++){ 
            if(!eval(simbl+simbl+"_array")[i]){    
            pos.push(i);
        }
        count++;
        }
        return {simbl:simbl,pos:pos};//возвращаем 
     }
            
      function getRandomPoint(simbl){//***
            var r,c,num;//строка столбец число в этой ячейке
            var point;//объект вставляемый в массив
            var mona;
                
            r = Math.floor(Math.random()*9);
            c = Math.floor(Math.random()*9);
            num = 10*r+c+1;
            point = {val:num,simbl:simbl.toLowerCase()};

            mona = checkNewCell(simbl,num);
                        
            return {whot:mona,point:point}
            
      } 
      
      function checkNewCell(simbl,num){ //***
          //проверяем соотв число правилам или нет      
          var count_rows = {"A":1,"B":2,"C":3};
          var out = false;
          var r = Math.ceil(num/10);
          var cell = (num - 1);
          out = (desk[cell] && eval('check_'+simbl)[r] < count_rows[simbl]);          
          return out;
      }
      
      function createTicket(){//***
          var str_A = '';
          $.each(AA_array, function(){
              str_A += ":"+this['simbl']+this['val']; 
          });
          str_A = str_A.substr(1);
          
          var str_B = '';
          $.each(BB_array, function(){
              str_B += ":"+this['simbl']+this['val'];
          });
          str_B = str_B.substr(1);
          
          var str_C = '';
          $.each(CC_array, function(){
              str_C += ":"+this['simbl']+this['val'];
          });
          str_C = str_C.substr(1);
          
          var out = {num_order:num_order,fA:str_A,fB:str_B,fC:str_C};
          
          $.ajax({
              url:'./action/update_ticket.php',
              type:'post',
              dataType:'json',
              data:out,
              success:function(data){
                  if(data['ok']>0){
                      document.location.href = "index.php?act=advance&ticket="+tid+"&pid="+pid;
                  }
              },
              error:function(data){
                  console.log(data['responseText']);
              }
          }); 
          return false;
      }
      
      function setDesk(){//***
               var arr = new Array('AA_array','BB_array','CC_array');
               var n = 0;
               
           for(var i = 0;i < desk.length;i++){
               desk[i]=true;
           }
                   
           for(i = 0;i < 3;i++){
               $.each(eval(arr[i]),function(){
                    var r;
                    var c;

                    if(this['val'] != undefined){
                            r = (this['val'])-1;
                            desk[r] = false;
                        }   
                        n++;
                }); 
           }

           return false; 
          }
});
