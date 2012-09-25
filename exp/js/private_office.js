/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    
    if (document.readyState != "complete"){
             
		setTimeout( arguments.callee, 100 );
		return; 
	}
        
//        customersAll(); 

    messageAll();
    
    var uid = $("#uid").val();
    
    var pid = $("#pid").val();
    
//    var desk = new Array();
//
//    for(var i =0;i<10;i++){
//        var rows = new Array();
//        for(var n = 0;n<10;n++){
//            rows.push({dis:true,weight:(n+1)});
//        }
//        desk.push(rows);
//    } 
//    
//    var A_array = new Array();
//        
//    var B_array = new Array();
//
//    var C_array = new Array();
//
//    var check_B = new Array(0,0,0,0,0,0,0,0,0);
//
//    var check_C = new Array(0,0,0,0,0,0,0,0,0);

    
     $('tr').click(function(){
         var str = '';
         $.each($("#ticket_0 tr(2) td(0)"),function(){ 
             $.each(this,function(){
//                 console.log(this);
             });
             
         });
        
    });
           
    $(".to_cart").mousedown(function(){
        var id = this.id;
        console.log(id);
        document.location.href = "?act=advance&ticket="+id;
    });

    
    function customersAll(){
        $.ajax({
            url:'./query/customers.php', 
            type:'post',
            dataType:'json',
            success:function(data){
                
                var str = '';
                $.each(data,function(){
                    str += this['name']+" -> "+this['secret_key']+"; ";
                });
//                console.log(str);
            },
            error:function(data){
//                console.log(data['responseText']);
            }
        });
    }
    function messageAll(){
        $.ajax({
            url:'./query/messages.php',
            type:'post',
            dataType:'json',
            success:function(data){
                
                $.each(data,function(){
//                    console.log(this['message']);
                    $("#msg > tbody").append('<tr><td>'+this['message']+'</td></tr>'); 
                })
                
            },
            error:function(data){
//                console.log(data['responseText']);
            }
        });
    }

});

