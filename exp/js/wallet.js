/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    
    var uid = $("#uid").val();
     
    var pid = $("#pid").val();
    
    var many = {'usd':{'cnt':32.4608,'name':'доллар'},'euro':{'cnt':40.6669,'name':'евро'},'rub':{'cnt':1,'name':'руб.'},'num':{'cnt':1,'name':'число'}};
    
    var wallet = new Array();
    
    var receipt = 0;var  outlay = 0;
    
    readWallet(uid);
    
//    $(document).mousedown(function(){
//        console.log(wallet);
//    });
    
    
//        return wallet;
    
    $(".h_wallet").mousedown(function(){
        
        var id = this.id;
        
        var cnt = many[id];    
        
        $("#cross_ku").text('Конверт курс: 1 число = '+(1/cnt['cnt']).toString().substr(0, 6)+" "+cnt['name']);
        
        $("#account").text('  '+Math.ceil(receipt/cnt['cnt'])+" "+cnt['name']);
        
        $("#ballans").text('  '+Math.ceil((receipt/cnt['cnt'])-outlay/cnt['cnt'])+" "+cnt['name']);
        
//        console.log($("#cross_ku").text());
        
    });
    
    function readWallet(uid){
//        var resp = new Array();
        $.ajax({
            url:'./query/read_wallet.php', 
            type:'post',
            dataType:'json',
            data:{uid:uid},
            success:function(data){
                wallet = data['wallet'];
                $.each(data['wallet'],function(){
                    console.log(this['count']+"; => "+this['action']);
                    if(this['action']==1){
                        receipt += Number(this['count']);
                        $("#table_wallet > tbody").append('<tr><td>'+this['time']+'</td><td>'+this['count']+'</td><td>'+this['doc']+" №"+this['num_doc']+'</td><td></td><td></td><td></td></tr>');
                    }else{
                        outlay += Number(this['count']);
                        $("#table_wallet > tbody").append('<tr><td></td><td></td><td></td><td>'+this['time']+'</td><td>'+this['count']+'</td><td>'+this['doc']+" №"+this['num_doc']+'</td></tr>');
                    }
                });
                $("#account").text('      '+receipt+" чисел");
                $("#ballans").text('  '+(receipt-outlay)+" чисел");
            },
            error:function(data){
                console.log(data['responseText']);
            }
            
        });
    }
     
});

