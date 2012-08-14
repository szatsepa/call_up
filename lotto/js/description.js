/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    
        if (document.readyState != "complete"){
             
		setTimeout( arguments.callee, 100 );
		return;
	}
        var check_A = new Array(0,0,0,0,0,0,0,0,0);
        
        var check_B = new Array(0,0,0,0,0,0,0,0,0);
        
        var check_C = new Array(0,0,0,0,0,0,0,0,0);
        
        var A_array = new Array();
        
        var B_array = new Array();
        
        var C_array = new Array();
        
        $(".to_cart").mousedown(function(){
            
            _clear();
            
            var a = this.id;
            
            var cod = this.name;
            
            $.ajax({
                url:'./query/check_ticket.php',
                type:'post',
                dataType:'json',
                data:{cod:cod},
                success:function(data){
                   sortingNum(data['return'],a);
                },
                error:function(data){
                    document.write(data['responseText']);
                }
            });
            
            return false;
        });
        
        function sortingNum(num_array, artikul){
            
            var num = 0;
            
            var sim = artikul.substr(0,1);
            
            var row = Math.floor(parseInt(artikul.substr(1))/10);
            
            var check = false;
            
            var count_a = 0;
            
            $.each(num_array,function(){
                
                num = Math.floor(this['weight']/10);
                
                if(this['group']=="A"){
                    
                count_a++; 
                
                    if(count_a == 5 || row == num){
                        check = true;
                     }
                    
                }else if(this['group']=="B"){
                    
                    B_array.push(this);
                    
                    check_B[num]++;
                    
                }else{
                    
                    C_array.push(this);
                    
                    check_B[num]++;
                }
            });
            
           
           
           if(!check){_addPoint(artikul)}else{alert("Смотри правила (наверное в этом поле уже достаточное количество таких символов)")};
        }
        function _checkPoint(artikul){
            var sim = artikul.substr(0,1);
            var check = false;
            alert(check_A);
//            if(A_array.length <= 5 && sim == "a"){
//                $.each(A_array,function(){
//                    if(this['artikul']==artikul){
//                        check = true;
//                    }
//                });
//            }else if(A_array.length == 5 && sim == "a"){
//                alert("Поле А заполнено");
//            }
            
            return check;
        }
        
        function _addPoint(artikul){
            alert(artikul);
        }
          
        function _clear(){ 
            for(var i = 0;i<8;i++){
               check_A[i]=check_B[i]=check_C[i]=0;
           }
           while(A_array.length){
               A_array.pop();
           }
           while(B_array.length){
               B_array.pop();
           }
           while(C_array.length){
               C_array.pop();
           }
        }
});

