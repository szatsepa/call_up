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
        
        var num_array = new Array();
        
        var A_array = new Array();
        
        var B_array = new Array();
        
        var C_array = new Array();
        
        var check_A = {1:0,2:0,3:0,4:0,5:0,6:0,7:0,8:0,9:0};
        
        var check_B = {1:0,2:0,3:0,4:0,5:0,6:0,7:0,8:0,9:0};
         
        var check_C = {1:0,2:0,3:0,4:0,5:0,6:0,7:0,8:0,9:0};
        
        var n = 0;
        
        var uid = $("#uid").val();
        
       var page = $("#page").val();
        
       var art = $("#fav").val();
        
       var pid = $("#pid").val();
        
        checkButton();
        
        checkCart(uid,pid);
               
           $(".my_button").mousedown(function(){
               var id = this.id;
               var atr = $("#"+id).attr('disabled'); 
               var artikul = this.name;
              
                
               if(atr != 'disabled' && uid){
                   
                    if(window.item_id == undefined){
                            document.location.href ="index.php?act=dscr&artikul="+artikul;
                        }else{
                            document.location.href ="index.php?act=dscr&artikul="+artikul+"&art="+window.item_id;
                        }
               }else if (!uid){
                   document.location.href ="index.php?act=regs"; 
               }
               
           });

       $(".my_button").css({'cursor':'pointer'}); 
       
       $("#sel_price").change(function(){
           
           var pid = this.options[this.selectedIndex].value; 
           
           if(pid == 0){
               document.location.href='index.php?act=look&pid=2';
           }else{
               document.location.href='index.php?act=look&pid='+pid;
           }
              
       });  
       
       function checkCart(uid,pid){ 
            $.ajax({ 
                url:'./query/check_cart.php',    
                type:'post',
                dataType:'json',
                data:{uid:uid,pid:pid},
                success:function(data){
                    console.log(data['cart']);
                    if(data['ok']){
                       sortingCart(data['cart']);  
                    }
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
           
           $.each(cart, function(){
               
               simbl = this['simbl'];
               
               weight = this['artikul'];
               
               eval(simbl+"_array").push(weight);

                num = Number(weight.substr(1,2));
                
                num_array.push(num);
                
                if ((num > 0) && (num < 11)){eval('check_'+simbl)['1']++;}
                else if ((num > 10) && (num < 21)){eval('check_'+simbl)['2']++;}
                else if ((num > 20) && (num < 31)){eval('check_'+simbl)['3']++;}			
                else if ((num > 30) && (num < 41)){eval('check_'+simbl)['4']++;}
                else if ((num > 40) && (num < 51)){eval('check_'+simbl)['5']++;}	
                else if ((num > 50) && (num < 61)){eval('check_'+simbl)['6']++;}			
                else if ((num > 60) && (num < 71)){eval('check_'+simbl)['7']++;}
                else if ((num > 70) && (num < 81)){eval('check_'+simbl)['8']++;}
                else if ((num > 80) && (num < 91)){eval('check_'+simbl)['9']++;}
              

               
               var a = (A_array.length >= 5);
               var b = (B_array.length >= 10);
               var c = (C_array.length >= 15);
                              
               if(page == 1 && a){
                   document.location.href ="index.php?act=look&page=2";
               }else{
                   if(page == 2 && b){
                        if(!a){
                            document.location.href ="index.php?act=look&page=1";
                        }
                        if(!c){
                            document.location.href ="index.php?act=look&page=3"; 
                        }
                        if(a && c){
                            document.location.href ="index.php?act=order&type=2"; 
                        }

                    }else{
                        if(page == 3 && c){ 
                            if(!a){ 
                                document.location.href ="index.php?act=look&page=1";
                            }
                            if(!b){
                                document.location.href ="index.php?act=look&page=2"; 
                            }
                            if(a && b){
                                document.location.href ="index.php?act=order&type=2"; 
                            }  
                        }
                    }
               }
               
           });
           
            checkPage(art);

           return false;
       }
       function checkPage(art){ 
           
           var i;
           var ltr = 'a';
           if(page == 2){
               ltr = 'b';
           }else if(page == 3){
               ltr = 'c';
           }
           var lim_arr = (page*5);
           
           $.each(num_array, function(){
               var num = parseInt(this);
               changeBtn((num-1));
           });
                      
        if(eval(ltr.toUpperCase()+"_array").length < lim_arr){             
                    $.each(eval(ltr.toUpperCase()+"_array"), function(){   
                        var num = this;
                        num = Number(num.substr(1,2));
                       
                        var row = Math.floor(num/10);
                        
                        if(eval('check_'+ltr.toUpperCase())[row+1] >= page){
                            for(i = (row*10);i < (10*(row)+9);i++){
                                changeBtn(i)+"; ";
                            } 
                        }
                        
                    });
        }

            $("#"+art).focus(); 
            $("#im_"+art+" > .my_button").css({'border': '6px solid #fce'});  

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
            return false; 
       }
       
       function changeBtn(id){
            var bid = (id);
            if(id<10){
                bid="0"+bid; 
            }
            $("#"+bid).remove();
            
            return false;
    }       
});  

