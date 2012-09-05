/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    
    
     var uid = $("#uid").val();
     
     var favorites = selectFavorites(window.pid);
     
     $("#add_cart").mousedown(function(){
         var str = "";
         var artikul = this.name;
         var out;
         if(window.item_id == undefined){ 
             out = {uid:uid,artikul:artikul};
        }else{
            out = {uid:uid,artikul:artikul,itid:window.item_id};
        }
        $("#add_cart").remove();
        
        $.ajax({
            url:'./action/add_cart.php',
            type:'post',
            dataType:'json',
            data:out,
            success:function(data){
                if(data['ok']){
                    document.location.href = "index.php?act=order&type=2";
                }
            },
            error:function(data){
                document.write(data['responseText']);
            }
        });
     });
     
     $(".favorites_point").live('mousedown',function(){
         var simbl = this.id;
         simbl = simbl.substr(0,1);
         var img = this.id.substr(1,2);
         
         var page = 1;
         if(simbl=='b'){
             page = 2;
         }else if(simbl == 'c'){
             page = 3;
         }
         console.log("img "+img);
         document.location.href = "index.php?act=look&page="+page+"&fav="+img;
     });
     
    function selectFavorites(pid){
        $.ajax({
            url:'./query/favorites_numbers.php',
            type:'post',
            dataType:'json',
            data:{pid:pid},
            success:function(data){
                
                var n = 0;
                var s_max = data['artikles'][0]['hm'];
                var s_min = data['artikles'][5]['hm'];   
                console.log(s_max+" "+s_min);  
                $.each(data['artikles'],function(){
                   
                    var item = this['artikul'];
                    
                    var img = this['img'];
                    
                    var bu_str = '<div class="imag_right" style="left: '+(135*n)+'px;"><input class="favorites_point" type="image" id="'+item+'" src="../images/goods/'+img+'"/></div>';
                   
                   $("#favorites").append(bu_str);
                   
                   n++;
                });

            },
            error:function(data){
                console.log(data['responseText']);
            }
        });
        
        return false;
    }
    
});
