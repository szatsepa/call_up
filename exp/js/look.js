/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
  $(document).ready(function () {
    
        if (document.readyState != "complete"){
             
		setTimeout( arguments.callee, 10 );
		return; 
	}
        
        var input_array = new Array();
        
        var A_array = new Array();
        
        var B_array = new Array();
        
        var C_array = new Array();
        
        var check_B = new Array(0,0,0,0,0,0,0,0,0);
         
        var check_C = new Array(0,0,0,0,0,0,0,0,0);
        
        var n = 0;
        
        var uid = $("#uid").val();
        
        var page = $("#page").val();
        
        checkButton();
        
        checkCart(uid);
               
           $(".my_button").mousedown(function(){
               var id = this.id;
               var atr = $("#"+id).attr('disabled');  
               var code = $("#cod").val();
               var artikul = this.name;
               if(atr != 'disabled'){
                   if(code != undefined){
                       document.location.href = "?act=dscr&artikul="+artikul+"&cod="+code;
                   }else{
                       document.location.href = "?act=dscr&artikul="+artikul; 
                   }
                    
               }
               
           });

       $(".my_button").css({'cursor':'pointer'});  
       
       function checkCart(uid){ 
            $.ajax({ 
                url:'./query/check_cart.php',    
                type:'post',
                dataType:'json',
                data:{uid:uid},
                success:function(data){
                      sortingCart(data['cart']);
                      
                },
                error:function(data){
                    document.write(data['responseText']); 
                }
            });
            return false;
       }
       
       function sortingCart(cart){
           var num = 0;
           var simbl = '';
           var weight = ''; 
           var str = '';
           $.each(cart, function(){
               
               simbl = this['simbl'];
               weight = this['artikul'];
               if(simbl == "A"){
                   
                   A_array.push(weight);
               }
               if(simbl == "B"){
                   B_array.push(weight);
                   weight = weight.substr(1,2);
                   num = parseInt(weight);
                   str += changeBtn(num,'b')+"; ";
                   if ((num >= 1) && (num <= 10)){check_B[0]++;}
                    else if ((num >= 11) && (num <= 20)){check_B[1]++;}
                    else if ((num >= 21) && (num <= 30)){check_B[2]++;}			
                    else if ((num >= 31) && (num <= 40)){check_B[3]++;}
                    else if ((num >= 41) && (num <= 50)){check_B[4]++;}	
                    else if ((num >= 51) && (num <= 60)){check_B[5]++;}			
                    else if ((num >= 61) && (num <= 70)){check_B[6]++;}
                    else if ((num >= 71) && (num <= 80)){check_B[7]++;}
                    else if ((num >= 81) && (num <= 90)){check_B[8]++;}
               }
               if(simbl == "C"){
                   weight = this['artikul']; 
                   C_array.push(weight);
                   weight = weight.substr(1,2);
                   num = parseInt(weight);
                   str += changeBtn(num,'c')+"; ";
                   if ((num >= 1) && (num <= 10)){check_C[0]++;}
                    else if ((num >= 11) && (num <= 20)){check_C[1]++;}
                    else if ((num >= 21) && (num <= 30)){check_C[2]++;}			
                    else if ((num >= 31) && (num <= 40)){check_C[3]++;}
                    else if ((num >= 41) && (num <= 50)){check_C[4]++;}	
                    else if ((num >= 51) && (num <= 60)){check_C[5]++;}			
                    else if ((num >= 61) && (num <= 70)){check_C[6]++;}
                    else if ((num >= 71) && (num <= 80)){check_C[7]++;}
                    else if ((num >= 81) && (num <= 90)){check_C[8]++;}
               }
               
           });
           
//           console.log(str);
            checkPage();        
           return false;
       }
       function checkPage(){ 
           
           var i;
           var mstr = '';
           var str = '';
//           str = "AL "+ A_array.length;
           if(page == 1 && A_array.length < 5){
//               
               $.each(A_array, function(){
                   var num = this;
                   num = num.substr(1,2);
                   var row = Math.floor(num/10);
//                   str += row+"; "
                   for(i = (row*10);i < (10*(row+1));i++){
                       
                      changeBtn(i,'a');
                   }  
               });
//               alert(str);
           }
           if(A_array.length == 5 && page == 1){
//               str += "A 5 p 1:  M "; 
               for(i = 0;i < 90;i++){
                      mstr = changeBtn(i,'a')+"; "; 
                      
//                      str += "; "+i+"/"+mstr; 
                   }
           } 
           if(page == 2 && B_array.length < 10 && A_array.length == 5){ 
               $.each(B_array, function(){
                   var num = this;
                   num = num.substr(1,2);
                   var row = Math.floor(num/10);
                   if(check_B[row] == 2){
                        for(i = (row*10);i < 10*(row+1);i++){
                            changeBtn(i,'b');
                        } 
                    }
               });
           }
           if(B_array.length == 10 && page == 2){
               for(i = 0;i < 90;i++){
                         changeBtn(i,'b');   
//                      
                   }
           }
           if(page == 3 && B_array.length < 15 && A_array.length == 5 && B_array.length == 10){ 
               $.each(C_array, function(){
                   var num = this;
                   num = num.substr(1,2);
                   var row = Math.floor(num/10);
                   if(check_C[row] == 3){
                        for(i = (row*10);i < 10*(row+1);i++){
                            changeBtn(i,'c');
                        } 
                    }
               });
           }
           if(С_array.length == 15 && page == 3){
               for(i = 0;i < 90;i++){
                         changeBtn(i,'с');   
//                      
                   }
           }
//            console.log(mstr); 
            console.log(str);
           return false;
       }
       function checkButton(){
           $("#cont").each(function(nd,my_div){
               $('#' + $(my_div).attr('id') + ' input:image').each(function(nd, inputData){
                var input_id = inputData.id;
                $("#"+input_id).attr({'disabled':false});
                input_array.push(input_id);
                n++;
            });
           });
//           alert(str);
            return false; 
       }
       
       function changeBtn(id, simbl){
            var bid = id;
            var did = (id+1);
            if(id<10){
                bid="0"+bid; 
            }
            if(id<9){
                did="0"+did;
            }
            $("#"+bid).attr({'disabled':'disabled'});
            $("#"+bid).css({'cursor':'default'});
            $("#"+simbl+did).css({'background-color':'#999999'}); 
            
            return bid+"|"+did;
    }
        
});  
