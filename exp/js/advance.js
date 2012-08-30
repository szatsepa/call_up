/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    
    alert("В свете посених заемечеаней эта страница подвегнецца коренной переломке!!!\nПриносим искренние извинения за моральный ущерб!!!\nПросьба ничего не НАЖИМАТЬ!!!");

    var dt = new Date();
    
    var month_array = new Array('01','02','03','04','05','06','07','08','09','10','11','12');
    
    var A_array = new Array();
        
    var B_array = new Array();

    var C_array = new Array();
    
    var artikuls = new Array();
    
     var str_date = dt.getDate()+"-"+month_array[dt.getMonth()]+"-"+dt.getFullYear();
    
    readOrder(window.order); 
    
    firstSelect();
    
//    buildSelect(dt);
    
    $("#year").change(function(){
        
//        console.log ($("#year :selected").val());
        
        $.ajax({
            url:'./query/whot_time.php',
            type:'post',
            dataType:'json',
            data:{YY:$("#year :selected").val()},
            success:function(data){
                var mdt = new Date();
//                console.log(data);
                window.low_y = data['low'];
                mdt.setYear($("#year :selected").val());
                clearSelect(mdt);
            },
            error:function(data){
                console.log(data);
            }
        });
        
        
        
    });
    $("#month").change(function(){
        
//        console.log ($("#month :selected").val());
        
        $.ajax({
            url:'./query/whot_time.php',
            type:'post',
            dataType:'json',
            data:{YY:$("#year :selected").val(),MM:$("#month :selected").val()},
            success:function(data){
                console.log(data);
                var mdt = new Date();
                window.low_y = data['low'];
                mdt.setYear($("#year :selected").val());
                mdt.setMonth(data['month']+1);
                clearSelect(mdt);
            },
            error:function(data){
                console.log(data);
            }
        });
        
        
        
    });
    
    $("#orderonosets").mousedown(function(){
        var email = $("#to_email").val();
        var shipment = document.getElementById("to_shipment").value;
        var desire = document.getElementById("desire").value;
        var marck = $("#marck").val();
        var dey = $("#dey :selected").val();
        var month = $("#month :selected").val();
        var year = $("#year :selected").val();
        var hh = $("#hh :selected").val();
        var mm = $("#mm :selected").val();
//        console.log(email+" "+shipment+" "+desire+" "+marck+" "+dey+" "+month+" "+year+" "+hh+" "+mm);
        
    });
    
    function readOrder(order){ 
                   
            $.ajax({ 
                url:'./query/read_order.php',    
                type:'post',
                dataType:'json',
                data:{order:order},
                success:function(data){ 
//                    console.log(data);
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
//               str += weight+"; "+img+"; "; 
               
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
//           ////console.log(str);
//           if(C_array.length == 15 && B_array.length == 10 && A_array.length == 5){
//               order_ready = true;
//           }
           
           return false 
       }
       
       function buildTicket(){
           
           var str = '';
           var a = 0;
           
           $.each(A_array, function(){
               str = this['img'];
               $("#TA_"+a).append("<input type='image' class='artikul_t' id='"+this['artikul']+"' alt='"+this['id']+"' src='../images/goods/"+this['img']+"' width='80' height='80' title='Изменить?'/>")
               a++;
           });
           a=0;
           $.each(B_array, function(){
               str = this['img'];
               $("#TB_"+a).append("<input type='image' class='artikul_t' id='"+this['artikul']+"' alt='"+this['id']+"' src='../images/goods/"+this['img']+"' width='80' height='80' title='Изменить?'/>")
               a++;
           });
           a=0;
           $.each(C_array, function(){
               str = this['img'];
               $("#TC_"+a).append("<input type='image' class='artikul_t' id='"+this['artikul']+"' alt='"+this['id']+"' src='../images/goods/"+this['img']+"' width='80' height='80' title='Изменить?'/>")
               a++;
           });
           return false;
       }
       
       function buildSelect(ydt,mn){
           
           var yy = dt.getFullYear();
           var syy = ydt.getFullYear();
                      
           for(var i = yy;i<(yy+3);i++){
               if(syy == i){
                   $("#year").append("<option value='"+i+"' selected>"+i+"</option>");
               }else{
                   $("#year").append("<option value='"+i+"'>"+i+"</option>");
               }
           }
           buildMonthSelect(ydt,mn);
       }
       
       function buildMonthSelect(dt,y){
           var mm = 0;
           if(!y){
               mm = dt.getMonth();
           }
          for(var i=0;i<12;i++){ 
               if(mm == i){
                   $("#month").append("<option value='"+i+"' selected>"+month_array[i]+"</option>");
               }else{
                   $("#month").append("<option value='"+i+"'>"+month_array[i]+"</option>");
               }
           }
           buildDeySellect(mm,dt);
       }
       function buildDeySellect(mm,dt){
           var count_dd = new Array(31,28,31,30,31,30,31,31,30,31,30,31);
           var dd = dt.getDate();
           var hh = dt.getHours();
           var minits = dt.getMinutes();
           var count = count_dd[mm];
           if(mm == 1 && window.low_y == 1){
               count = 29;
           }
           for(var i=0;i<count;i++){
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
//               console.log(minits+" > "+i+" "+(minits > i-4 )+" "+minits+" < "+(i)+" "+(minits < i+5 )); 
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
           var DD = now.getDate();
           $.ajax({
            url:'./query/whot_time.php',
            type:'post',
            dataType:'json',
            data:{YY:YY,MM:MM,DD:DD},
            success:function(data){
                var mdt = new Date();
//                console.log(data);
                window.low_y = data['low'];
                mdt.setYear(data['year']);
                clearSelect(mdt,false);
            },
            error:function(data){
                console.log(data);
            }
        });
       }
       function clearSelect(mdt,mn){ 
           $("#year, #month, #dey").empty();
           buildSelect(mdt,mn);
       }
});
