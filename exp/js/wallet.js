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
    
    $("td").css('width','504px');
        
    readWallet(uid);
    
     $.ajax({
            url:'./query/how_meny.php',
            type:'post',
            dataType:'json',
            data:{},
            success:function(data){
//                console.log(data); 
                many['usd']['cnt'] = data['usd'];
                many['euro']['cnt']=data['euro'];
                senja = data['date'];
                $("#c_usd").text(many['usd']['cnt']);
                $("#c_euro").text(many['euro']['cnt']); 
                $("#senja").text(senja);
            }
        });
        
//        $("div").css('outline', '1px solid grey');
    
    $(".h_wallet").mousedown(function(){
        
        var id = this.id;
        
        var cnt = many[id];    
        
        $("#cross_ku").text('Конверт курс: 1 число = '+(1/cnt['cnt']).toString().substr(0, 6)+" "+cnt['name']);
        
//        $("#account").text('  '+Math.ceil(receipt/cnt['cnt'])+" "+cnt['name']);
        
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
//                    console.log(this['count']+"; => "+this['action']);
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
    
//    http://cbrates.rbc.ru/tsv/840/2012/09/12.tsv
//где
//*1* - код валюты по ЦБ (978-евро 840 - доллар и т.д.)
//*2* - год
//*3* - месяц
//*4* - день
//     
});

