/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 $(document).ready(function () {
     
         var dt = new Date();
     
         var A_array = new Array();
        
         var B_array = new Array();
        
         var C_array = new Array();
         
         var uid = $("#uid").val();
         
         var pid = $("#pid").val();
         
         var month_array = new Array('01.','02','03','04','05','06','07','08','09','10','11','12');
         
         var order_ready = false;
         
         var N_O = numOrder();
         
         var str_date = dt.getDate()+"-"+month_array[dt.getMonth()]+"-"+dt.getFullYear();
         
         $("#n_ticket").text('Билет № '+N_O+' от '+str_date+'г.');
         
         checkCart(uid, pid);
         
         $("#sel_price").change(function(){
           
           var pid = this.options[this.selectedIndex].value;  
           
           document.location.href='index.php?act=order&type=2&pid='+pid;
           
              
       });
       
         
         $("#make_order").mousedown(function(){
             
             var A = '';
             var n = 0;
             for(var i = 0;i<5;i++){
                    if(A_array[i]!=undefined){
                        A += ':'+A_array[i]['artikul']; 
                    }else{
                        A += ':a00'+n;
                    }
                    n++;
                }
             var B = '';
             for(i = 0;i<10;i++){
                    if(B_array[i]!=undefined){
                        B += ':'+B_array[i]['artikul']; 
                    }else{
                        B += ':b00'+n;
                    }
                    n++;
                }
             var C = '';
             for(i = 0;i<15;i++){
                    if(C_array[i]!=undefined){
                        C += ':'+C_array[i]['artikul']; 
                    }else{
                        C += ':c00'+n;
                    }
                    n++
                }


             A = A.substr(1);
             B = B.substr(1);
             C = C.substr(1); 
//             console.log(A+'\n'+B+'\n'+C);
                 $.ajax({
                     url:'./action/create_order.php',
                     type:'post',
                     tataType:'json',
                     data:{uid:uid,num:N_O,A:A,B:B,C:C,pid:pid},
                     success:function(data){
                             document.location.href = "index.php?act=private_office"; 
                         
                     },
                     error:function(data){
                         document.write(data['responseText']);
                     }
                 });
             
         });
         
         
         $(".artikul_t").live('mousedown',function(){
//             var artikul = this.id; 
//             var id = this.alt;
//             var page = 1;
//             var simbl = artikul.substr(0,1);
//             if(simbl == 'b'){
//                 page = 2;
//             }else if(simbl == 'c'){
//                 page = 3;
//             }
//             $.ajax({
//                 url:'./action/change_artikul.php', 
//                 type:'post',
//                 dataType:'json',
//                 data:{id:id,pid:pid},
//                 success:function(data){
//                     if(data['ok'] == 1){
//                         document.location.href = "index.php?act=look&page="+page+"&idc="+id;
//                     }
//                 },
//                 error:function(data){
//                     document.write(data['responseText']);
//                 }
//                 
//             });
         });
     
            function checkCart(uid, pid){ 
                
                var ready;
                
            $.ajax({ 
                url:'./query/read_cart.php',    
                type:'post',
                dataType:'json',
                data:{uid:uid,pid:pid},
                success:function(data){ 
//                    console.log(data['cart']); 
                    if(data['ok']){
                       ready = sortingCart(data['cart']); 
                       buildTicket();
                    }
                },
                error:function(data){
                    document.write(data['responseText']); 
                }
            });
            return ready;
       }
       
       function sortingCart(cart){
           
           var num = 0;
           var simbl = '';
           var weight = ''; 
           var img = '';
           var id = '';
           
           $.each(cart, function(){
               
               simbl = this['simbl'];
//               if(simbl != 'A' || simbl != 'B' || simbl != 'C'){
//                   return false;
//               }
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
           if(C_array.length == 15 && B_array.length == 10 && A_array.length == 5){
               order_ready = true;
           }
           
           return false
       }
       
       function buildTicket(){
           
           var str = '';
           var a = 0;
           
           $.each(A_array, function(){
               str = this['img'];
               $("#TA_"+a).append("<img class='artikul_t' id='"+this['artikul']+"' alt='"+this['id']+"' src='../images/goods/"+this['img']+"' width='80' height='80'/>")
               a++;
           });
           a=0;
           $.each(B_array, function(){
               str = this['img'];
               $("#TB_"+a).append("<img class='artikul_t' id='"+this['artikul']+"' alt='"+this['id']+"' src='../images/goods/"+this['img']+"' width='80' height='80'/>")
               a++;
           });
           a=0;
           $.each(C_array, function(){
               str = this['img'];
               $("#TC_"+a).append("<img class='artikul_t' id='"+this['artikul']+"' alt='"+this['id']+"' src='../images/goods/"+this['img']+"' width='80' height='80'/>")
               a++;
           });
           $(".artikul_t").css('cursor','default');
           return false;
       }
       function numOrder(){
            var str = '';
            for(var ii = 0;ii<4;ii++){
                for(var i=0;i<3;i++){
                    var tmp = Math.ceil(Math.random()*9);
                    str += tmp;
                }
            if(ii != 3)str += ' ';          
            }

            return str;
        }

 });
