/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    
    var uid = $("#uid").val();
    
    $("#dele_t").mousedown(function(){
        var id = this.name;
        $.ajax({
            url:'./action/delete_ticket.php',
            type:'post',
            dataType:'json',
            data:{id:id},
            success:function(data){
                if(data['ok'] == 1){
                    document.reload();
                }
            },
            error:function(data){
                document.write(data['responseText']);
            }
        });
    });
    $("#sale_t").mousedown(function(){
        var id = this.name;
        var resolution = screen.width+"X"+screen.height;
        $.ajax({
           url:'./action/buy_ticket.php',
            type:'post',
            dataType:'json',
            data:{id:id,resolution:resolution},
            success:function(data){
                console.log(data['simbls']);
                console.log(data['ok']);
                alert("ПРОДАНО!!!");
                if(data['ok'] == 30){
                    document.location.href = "?act=private_office";
                }
            },
            error:function(data){
                document.write(data['responseText']);
            }
         
        });
    });
});

