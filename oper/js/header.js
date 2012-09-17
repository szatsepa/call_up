/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
   
    var act = $("#act").val();
    
    
        $("#customer").mousedown(function(){
            if(act != 'main'){
                document.location.href = "index.php?act=main"
            }
        });
    
   
        $("#accounts").mousedown(function(){
            if(act != 'ont'){
                document.location.href = "index.php?act=ont"
            }
        });
});

