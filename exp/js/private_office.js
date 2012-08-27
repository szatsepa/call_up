/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    
    var uid = $("#uid").val();
    
    var fields = new Array();
    
    var nums = new Array();
    
    setNums();
    
    function setNums(){
        for(var i = 1;i<91;i++){
                var inp = i;
                if(i < 10){
                    inp = "0"+inp;
                }
                nums.push(inp);
        }
        console.log(nums);
    }
    
    goodLuck();
        
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
                if(data['ok'] == 30){
                    document.location.href = "?act=private_office";
                }
            },
            error:function(data){
                document.write(data['responseText']);
            }
         
        });
    });
        
    function goodLuck(){
        while(fields.length < 30){
            var pos =  Math.ceil(Math.random() * (nums.length - 1)); 
            if(nums[pos]!=null)fields.push(nums[pos]);
            delete nums[pos];
        }
        
        console.log(nums);
        console.log(fields);
    }
});

