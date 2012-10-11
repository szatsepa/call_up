/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    
    if (document.readyState != "complete"){
             
		setTimeout( arguments.callee, 100 );
		return; 
	}

    messageAll();
    
    var uid = $("#uid").val();
    
    var pid = $("#pid").val();
    
    $.ajax({
        url:'./query/video_link.php',
        type:'post',
        dataType:'json',
        success:function(data){
            $("#msg > tbody").append('<tr><td><strong>Последний розыгрыш можно посмотреть по ссылке:</strong></td></tr>');
            $("#msg > tbody").append('<tr><td><a href="'+data['vl']+'" target="_blank">'+data['vl']+'</a></td></tr>');
        },
        error:function(data){
            console.log(data['responseText']);
        }
    });

    
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
//        console.log(id);
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

