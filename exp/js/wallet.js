/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    
    var uid = $("#uid").val();
     
    var pid = $("#pid").val();
    
    var many = {'usd':{'cnt':32.4608,'name':'доллар'},'euro':{'cnt':40.6669,'name':'евро'},'rub':{'cnt':1,'name':'руб.'},'num':{'cnt':1,'name':'число'}};
    
    $(".h_wallet").mousedown(function(){
        
        var id = this.id;
        
        var cnt = many[id];
        
        $("#cross_ku").text('Конверт курс: 1 число = '+(1/cnt['cnt']).toString().substr(0, 6)+" "+cnt['name']);
        
        $("#account").text('Ваш личный счет:	'+Math.ceil(1546/cnt['cnt'])+" "+cnt['name']);
        
        $("#ballans").text('Баланс счета :  '+Math.ceil((100000/cnt['cnt'])-1546/cnt['cnt'])+" "+cnt['name']);
        
//        console.log($("#cross_ku").text());
        
    });
     
});

