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
    
    var senja = '';
    
    var page = 0;
    
    $("#kurs > td").css('width','504px'); 
        
    readWallet(uid);
    
     $.ajax({
            url:'./query/how_meny.php',
            type:'post',
            dataType:'json',
            data:{},
            success:function(data){ 
                many['usd']['cnt'] = data['usd'];
                many['euro']['cnt']=data['euro'];
                senja = data['date'];
                $("#c_usd").text(many['usd']['cnt']);
                $("#c_euro").text(many['euro']['cnt']); 
                $("#senja").text(senja);
                $(".b_wallet").css('visibility','visible');
            }
        });
        
        $(".a_pager").live('click',function(){ 
            var id=this.id;
            page = $("#"+id).text();
            page = Number(page)-1;
            buildWallet((page));
        });
    
    $(".h_wallet").mousedown(function(){
        
        var id = this.id;
        
        var cnt = many[id]; 
        
        $("#cross_ku").text('Конверт курс: 1 число = '+(1/cnt['cnt']).toString().substr(0, 6)+" "+cnt['name']);

        $("#ballans").text('  '+Math.ceil((receipt/cnt['cnt'])-outlay/cnt['cnt']).toFixed(2)+" "+cnt['name']);
        
    });
    
    function readWallet(uid){
        $.ajax({
            url:'./query/read_wallet.php', 
            type:'post',
            dataType:'json',
            data:{uid:uid},
            success:function(data){
                wallet = data['wallet'];
                buildWallet(0);
            },
            error:function(data){
                console.log(data['responseText']);
            }
            
        });
    }
    function buildWallet(page){   
        
        $("#table_wallet > tbody").empty();
        
        var rows = 36;
        var pos = rows*page;
        pager(rows);
        
        for(var j = pos;j<(pos+rows);j++){
            
            if(pos == 0){
                if(wallet[j]['action']==1){
                        receipt += Number(wallet[j]['count']);
                    }else{
                        outlay += Number(wallet[j]['count']);
                        
                    }
                    $("#account").text('      '+receipt+" чисел");
                    $("#ballans").text('  '+(receipt-outlay).toFixed(2)+" чисел");
                } 
                if(wallet[j]==undefined){ 
                    return;
                }
                
                
                if(wallet[j]['action']==1){
                        $("#table_wallet > tbody").append('<tr><td>'+(j+1)+'</td><td>'+wallet[j]['time']+'</td><td>'+wallet[j]['count']+'</td><td>'+wallet[j]['doc']+" №"+wallet[j]['num_doc']+'</td><td></td><td></td><td></td></tr>');
                    }else{
                        $("#table_wallet > tbody").append('<tr><td>'+(j+1)+'</td><td></td><td></td><td></td><td>'+wallet[j]['time']+'</td><td>'+wallet[j]['count']+'</td><td>'+wallet[j]['doc']+" №"+wallet[j]['num_doc']+'</td></tr>');
                    }                 
                }   
                return false;
    }
    
    function pager(rows){
        
        $("#p_pager").empty();
        
        var len = wallet.length;
        var pages = Math.ceil(len/rows);
        
        if(len > rows){
                    for(var i = 0;i<(pages);i++){
                        $("#p_pager").append('<a class="a_pager" id="p_'+(i+1)+'">&nbsp;'+(i+1)+'&nbsp;</a>');
                    }
                    $("#p_pager").append('<a style="color: black">&nbsp;&nbsp;&nbsp;Страница&nbsp;'+(page+1)+'</a>');
                }
    }
    
});

