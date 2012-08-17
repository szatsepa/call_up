/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
  $(document).ready(function () {
    
        if (document.readyState != "complete"){
             
		setTimeout( arguments.callee, 500 );
		return;
	}
        
        var input_array = new Array();
        
        var A_array = new Array();
        
        var B_array = new Array();
        
        var C_array = new Array();
        
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
                       document.location.href = "?act=dscr&artikul="+artikul+"&price_id=2&stid=2&cod="+code;
                   }else{
                       document.location.href = "?act=dscr&artikul="+artikul+"&price_id=2&stid=2"; 
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
           
           var simbl = '';
           var weight = ''; 
           
           $.each(cart, function(){
               
               simbl = this['simbl'];
               
               if(simbl == "A"){
                   weight = this['artikul'];
                   A_array.push(weight);
               }
               if(simbl == "B"){
                   weight = this['artikul'];
                   B_array.push(weight);
               }
               if(simbl == "C"){
                   weight = this['artikul'];
                   C_array.push(weight);
               }
               
           }); 
            checkPage();        
//           return false;
       }
       function checkPage(){ 
           
           if(page == 1 && A_array.length < 5){
               $.each(A_array, function(){
                   var num = this;
                   num = num.substr(1,2);
                   var row = Math.floor(num/10);
//                   str += row+"; "
                   for(var i = (row*10);i < 10*(row+1);i++){
                       var id = i;
                       var did = (i+1);
                       if(i<9){
                           id="0"+i;
                           did="0"+(i+1); 
                       }
                       $("#"+id).attr({'disabled':'disabled'});
                       $("#a"+did).css({'background-color':'#eeeeee'}); 
//                       str += "#"+id+'; ';
                   }  
               });
           }else if(A_array.length == 5 && page == 1){
               for(var i = 0;i < 89;i++){
                       var id = i;
                       var did = (i+1);
                       if(i<9){
                           id="0"+i;
                           did="0"+(i+1); 
                       }
                       $("#"+id).attr({'disabled':'disabled'});
                       $("#a"+did).css({'background-color':'#eeeeee'}); 
//                      
                   }
           }
//           alert(str);
           return false;
       }
       function checkButton(){
//           var str = '';
           $("#cont").each(function(nd,my_div){
               $('#' + $(my_div).attr('id') + ' input:image').each(function(nd, inputData){
                var input_id = inputData.id;
                $("#"+input_id).attr({'disabled':false});
                input_array.push(input_id);
//                str += input_id+";  ";
                n++;
            });
           });
//           alert(str);
            return false;
       }
        
});  

