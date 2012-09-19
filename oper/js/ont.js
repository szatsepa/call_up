/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    
    var uid = $("#uid").val();
        
    var is_table = false; 
    
    var s_type = 1;
    
    var carrency = 'rub';
    
    var senja = '';
    
    var num_row;
    
    var many = {'usd':0,'euro':0,'rub':1,'num':1};
    
      $.ajax({
            url:'query/how_meny.php',
            type:'post',
            dataType:'json',
            data:{},
            success:function(data){ 
                many['usd'] = data['usd'];
                many['euro'] = data['euro'];
                senja = data['date'];
                $("#date_doc").val(senja);
            }
        });
    
    $("#s_type").change(function(){
        s_type = this.options[this.selectedIndex].value; 
    });
    $("#sel_carrency").change(function(){
        carrency = this.options[this.selectedIndex].value;
    });
    
    $("a_list >tr").live('click',function(){
        console.log(this.id)
        $("#"+num_row).css('background-color','inherit');
        num_row = this.id; 
        $("#"+num_row).css('background-color','#ecfcec');
    });
    
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
         $("#customer_id").val(uid);
         $(".t_wallet").css('display', 'none');
         $("#about_account").css('display', 'block');
         $("#who_account >td:eq(0)").text($("#r_"+uid+" > td:eq(1)").text());
     });
     
     $("#save_doc").mousedown(function(){
         var count = Number($("#count").val())*many[carrency];
         var out = {uid:$("#customer_id").val(),stype:s_type,count:count,date_doc:$("#date_doc").val(),doc:$("#doc").val(),num_doc:$("#num_doc").val()};
         
         $.ajax({
             url:'./action/add_money.php',
             type:'post',
             dataType:'json',
             data:out,
             success:function(data){
                 console.log("#r_"+$("#customer_id").val());
                 if(data['ins']){
                    $("#about_account").css('display', 'none');
                    $("#r_"+$("#customer_id").val()).css('background-color','#fcecec');
                    $("#r_"+$("#customer_id").val()+">eq(4)").text(data['ball']);
                 }
             },
             error:function(data){
                 document.write(data['responseText']);
             }
         });
     });
     
     $(".view_wallet").live('click',function(){
         var uid = this.name;
         $("#table_wallet > tbody").empty();
         $("#about_account").css('display', 'none');
         $.ajax({
             url:'./query/read_wallet.php',
             type:'post',
             dataType:'json',
             data:{uid:uid},
             success:function(data){
                $.each(data['wallet'],function(){
                    if(this['action']==1){
                        $("#table_wallet > tbody").append('<tr class="dat"><td class="dat">'+this['time']+'</td><td class="dat">'+this['count']+'</td><td class="dat">'+this['doc']+" №"+this['num_doc']+'</td><td class="dat"></td><td class="dat"></td><td class="dat"></td></tr>');
                    }else{
                        $("#table_wallet > tbody").append('<tr class="dat"><td class="dat"></td><td class="dat"></td><td class="dat"></td><td class="dat">'+this['time']+'</td><td class="dat">'+this['count']+'</td><td class="dat">'+this['doc']+" №"+this['num_doc']+'</td></tr>');
                    }
                }); 
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

