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
         
         var month_array = new Array('01.','02','03','04','05','06','07','08','09','10','11','12');
         
         var order_ready = false;
         
         var N_O = numOrder();
         
         var str_date = dt.getDate()+"-"+month_array[dt.getMonth()]+"-"+dt.getFullYear();
         
         $("#n_ticket").text('Билет № '+N_O+' от '+str_date+'г.')
         
         checkCart(uid);
         
         $("#make_order").mousedown(function(){
             alert(N_O+" "+order_ready);
         });
         
         $(".artikul_t").live('mousedown',function(){
             var artikul = this.id;
             var id = this.alt;
             var page = 1;
             var simbl = artikul.substr(0,1);
             if(simbl == 'b'){
                 page = 2;
             }else if(simbl == 'c'){
                 page = 3;
             }
             $.ajax({
                 url:'./action/change_artikul.php',
                 type:'post',
                 dataType:'json',
                 data:{id:id},
                 success:function(data){
                     if(data['ok'] == 1){
                         document.location.href = "?act=look&page="+page;
                     }
                 },
                 error:function(data){
                     document.write(data['responseText']);
                 }
                 
             });
         });
     
            function checkCart(uid){ 
                
                var ready;
                
            $.ajax({ 
                url:'./query/read_cart.php',    
                type:'post',
                dataType:'json',
                data:{uid:uid},
                success:function(data){ 
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
//           console.log(str);
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
       function numOrder(){
            var str = '';
            for(var ii = 0;ii<4;ii++){
                for(var i=0;i<3;i++){
                    var tmp = Math.ceil(Math.random()*10);
                    str += tmp;
                }
            if(ii != 3)str += ' ';         
            }

            return str;
        }

 });
