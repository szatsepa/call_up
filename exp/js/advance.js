/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    
    alert("В свете посених заемечеаней эта страница подвегнецца коренной переломке!!!\nПриносим искренние извинения за моральный ущерб!!!\nПросьба ничего не НАЖИМАТЬ!!!");

    var dt = new Date();
    
    var month_array = new Array('01.','02','03','04','05','06','07','08','09','10','11','12');
    
    var A_array = new Array();
        
    var B_array = new Array();

    var C_array = new Array();
    
    var artikuls = new Array();
    
     var str_date = dt.getDate()+"-"+month_array[dt.getMonth()]+"-"+dt.getFullYear();
    
    readOrder(window.order);
    
    console.log(dt.getDate()+" - "+dt.getMonth()+" - "+dt.getFullYear());
    
    $("#oderonosets").mousedown(function(){
        var email = $("#to_email").val();
        var shipment = document.getElementById("to_shipment").value;
        var desire = document.getElementById("desire").value;
        var marck = $("#marck").val();
        var dey = $("#dey :selected").val();
        var month = $("#month :selected").val();
        var year = $("#year :selected").val();
        var hh = $("#hh :selected").val();
        var mm = $("#mm :selected").val();
        console.log(email+" "+shipment+" "+desire+" "+marck+" "+dey+" "+month+" "+year+" "+hh+" "+mm);
        
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
});
