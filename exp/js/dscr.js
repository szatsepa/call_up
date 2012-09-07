/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    
    
     var uid = $("#uid").val();
     
     var price_id = $("#pid").val();
     
//     $("#see_all").css('outline','1px solid grey');
//     
//     $("#see_all").css('visibility','visible');
          
     selectFavorites(price_id); 
     
     $("#add_to_cart").live('mousedown',function(){
        
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
        var page = $("#this_page").val();
        $.ajax({
            url:'./query/favorites_numbers.php',
            type:'post',
            dataType:'json',
            data:{pid:price_id,page:page}, 
            success:function(data){
                
                    if(data['artikles']){ 
                        var n = 0;
                        var s_max = data['artikles'][0]['hm'];
                        $.each(data['artikles'],function(){

                                var item = this['artikul'];

                                var img = this['img'];

                                var rt = this['hm'];
                                
//                                var perc = Math.ceil(((6-n)/6)*100);

                                var perc = Math.pow((0.12*(6-n)),2)*100+36;
                                
//                                console.log(Math.pow((0.12*(6-n)),2)*100+36);   

                                var bu_str = '<div class="imag_right" style="left: '+(135*n)+'px;"><div><img class="favorites_point" id="'+this['artikul']+'" src="../images/goods/'+img+'" width="98" height="98"/></div><div class="favor" id="f_'+n+'"></div></div>';

                                $("#favors").append(bu_str); 

                                $("#f_"+n).css('width',perc+"%"); 
                                
                                $("#"+this['artikul']).css('cursor', 'pointer');
                                
                                if(n == 1)$("#see_all").css('visibility','visible');
                               
                                n++;
                            });
                         }   
                            $("#v_korzinu").css('z-index', '99999'); 
//                  console.log($("#add_to_cart"));
                
//                $(".footer_box").css({'z-index':'99999'});
            },
            error:function(data){
                console.log(data['responseText']);
            }
        });
        
        return false;
    }
    
});
