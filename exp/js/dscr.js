/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    
    
     var uid = $("#uid").val();
     
     var price_id = $("#pid").val();
     
//     $("#add_to_cart").css({'color':'#878787','text-decoration':'underline', 'cursor':'pointer'}); 
     
//     console.log(uid+" "+price_id); 
     selectFavorites(price_id); 
     
//     $("div").css('outline','1px solid #eee');

//     $("#img_bg").mousedown(function(){
//         alert('A');
//     });
     
     $("#add_to_cart").mousedown(function(){
        
         var artikul = $("#artikul").val();
         var out = {uid:uid,artikul:artikul,pid:price_id};
         if(window.item_id != undefined){ 
             out = {uid:uid,artikul:artikul,itid:window.item_id,pid:price_id};
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
         document.location.href = "index.php?act=look&page="+page+"&fav="+img;
     });
     
    function selectFavorites(price_id){
        $.ajax({
            url:'./query/favorites_numbers.php',
            type:'post',
            dataType:'json',
            data:{pid:price_id},
            success:function(data){
                if(data['cnt'] > 0){
                    console.log(data);
                    var n = 0;
                    var s_max = data['artikles'][0]['hm']; 
                    var cnt = Math.ceil(parseInt(data['cnt'])/30); 
                        $.each(data['artikles'],function(){

                                var item = this['artikul'];

                                var img = this['img'];

                                var rt = this['hm'];
                                
                                if(rt){
                                        var perc = Math.ceil((rt/s_max)*100); 

                                        var bu_str = '<div class="imag_right" style="left: '+(135*n)+'px;"><div><input class="favorites_point" type="image" id="'+item+'" src="../images/goods/'+img+'" width="98" height="98"/></div><div class="favor" id="f_'+item+'"></div></div>';

                                        $("#favors").append(bu_str); 

                                        $("#f_"+item).css('width',perc+"%"); 
                                }

                               

                                n++;
                            });
                }else{
                                    $("#see_all").remove(); 
                                }  
                
//                $(".footer_box").css({'z-index':'99999'});
            },
            error:function(data){
                console.log(data['responseText']);
            }
        });
        
        return false;
    }
    
});
