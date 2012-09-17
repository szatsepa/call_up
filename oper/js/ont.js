/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    
    var uid = $("#uid").val();
        
    var is_table = false;
    
//    var receipt = 0;var  outlay = 0;
    
    if($("#act").val() == 'ont' && uid){
            $.ajax({
                url:'query/accountlist.php',
                type:'post',
                dataType:'json',
                data:{uid:uid},
                success:function(data){
                    if(!is_table){
                        buildCustomersList(data['list']);
                        is_table = !is_table;
                    }                
                },
                error:function(data){
                    document.write(data['responseText']);
                }
            });
        }
        
     $(".edit_wallet").live('click',function(){
         var uid = this.name;
         var who = $("#r_"+uid+" > td:eq(1)").text();
         $(".t_wallet").css('display', 'none');
         $("#about_account").css('display', 'block');
         $("#who_account >td:eq(0)").text(who);
     });
     
     $(".view_wallet").live('click',function(){
         var uid = this.name;
         $("#table_wallet > tbody").empty();
         $.ajax({
             url:'./query/read_wallet.php',
             type:'post',
             dataType:'json',
             data:{uid:uid},
             success:function(data){
                $.each(data['wallet'],function(){
                    if(this['action']==1){
//                        receipt += Number(this['count']);
                        $("#table_wallet > tbody").append('<tr class="dat"><td class="dat">'+this['time']+'</td><td class="dat">'+this['count']+'</td><td class="dat">'+this['doc']+" №"+this['num_doc']+'</td><td class="dat"></td><td class="dat"></td><td class="dat"></td></tr>');
                    }else{
//                        outlay += Number(this['count']);
                        $("#table_wallet > tbody").append('<tr class="dat"><td class="dat"></td><td class="dat"></td><td class="dat"></td><td class="dat">'+this['time']+'</td><td class="dat">'+this['count']+'</td><td class="dat">'+this['doc']+" №"+this['num_doc']+'</td></tr>');
                    }
                }); 
//                $("#t_wallet").css('width', '742px');
             },
             error:function(data){
                 document.write(data['responseText']);
             }
         });
         var who = $("#r_"+uid+" > td:eq(1)").text();
         $(".t_wallet").css('display', 'block');
         $("#who >td:eq(0)").text(who);
         
     });
        
    function buildCustomersList(customers){
        $("#account_list").css('display','block');
        
        $.each(customers, function(){
            $("#a_list > tbody").append('<tr id="r_'+this['id']+'"><td class="dat">'+this['id']+'</td><td class="dat">'+this['surname']+' '+this['name']+' '+this['patronymic']+' '+'</td><td class="dat">'+this['e_mail']+'</td><td class="dat">'+this['phone']+'</td><td class="dat">'+this['ball']+'</td><td class="dat"><a class="edit_wallet" name="'+this['id']+'">Изменить.</a></td><td class="dat"><a class="view_wallet" name="'+this['id']+'">Смотреть.</a></td></tr>');
           
        });
        
        
    }
});

