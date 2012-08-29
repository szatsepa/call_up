/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    
    
     var uid = $("#uid").val();
     
     $("#add_cart").mousedown(function(){
         var str = "";
         var artikul = this.name;
         var out;
         if(window.item_id == undefined){ 
             out = {uid:uid,artikul:artikul};
        }else{
            out = {uid:uid,artikul:artikul,itid:window.item_id};
        }
        console.log(out);
        $.ajax({
            url:'./action/add_cart.php',
            type:'post',
            dataType:'json',
            data:out,
            success:function(data){
                if(data['ok']){
                    document.location.href = "?act=order&type=2";
                }
            },
            error:function(data){
                document.write(data['responseText']);
            }
        });
     });
    
    
});
