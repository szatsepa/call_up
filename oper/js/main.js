/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    
    var uid = $("#uid").val();
    
    var num_row = 0;
    
    var is_table = false;
    
   
    if($("#act").val() == 'main' && uid){
        $.ajax({
            url:'query/customerslist.php',
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
        
    $(".delete_customer").live('click',function(){
        var uid = this.name;
        if(confirm("Действительно удалить клиента?")){
            $.ajax({
                url:'./action/delete_customer.php',
                type:'post',
                dataType:'json',
                data:{uid:uid},
                success:function(data){
                    var uu = "#r_"+data['uid'];
                    $(uu).remove();
                },
                error:function(data){
                    document.write(data['responseText']);
                }
            });
        }
        
    });
    
    $(".get_pwd").live('click',function(){
        var uid = this.name;
        $.ajax({
            url:'./action/get_pwd.php',
            type:'post',
            dataType:'json',
            data:{uid:uid},
            success:function(data){
                if(data['msg']==1){
                    alert('Пароль отправлен в почту клиенту');
                }
            },
            error:function(data){
                document.write(data['responseText']);
            }
            
        });
        
    });
    
    $("#edit_cu").live('click',function(){

        var surname = $("#cu_surname").val();
        var name = $("#cu_name").val();
        var patronymic = $("#cu_patronymic").val();
        var email = $("#cu_email").val();
        var phone = $("#cu_phone").val();
        var shipping = $("#cu_shipping").val();
        var desire = $("#cu_desire").val();
        var cuid = $("#cuid").val();
        var out = {uid:cuid,surname:surname,name:name,patronymic:patronymic,email:email,phone:phone,shipping:shipping,desire:desire};
 
            $.ajax({
                url:'./action/edit_customer.php', 
                type:'post',
                dataType:'json',
                data:out,
                success:function(data){
                    if(data['customer']){
                        $("#r_"+data['customer']['uid']+" > td:eq(1)").text(data['customer']['surname']+' '+data['customer']['name']+' '+data['customer']['patronymic']);
                        $("#r_"+data['customer']['uid']+" > td:eq(2)").text(data['customer']['email']);
                        $("#r_"+data['customer']['uid']+" > td:eq(3)").text(data['customer']['phone']);
                        $("#r_"+data['customer']['uid']+" > td:eq(4)").text(data['customer']['shipping']);
                        $("#r_"+data['customer']['uid']+" > td:eq(5)").text(data['customer']['desire']);
                        $("#r_"+data['customer']['uid']).css('background-color','#ececfc');
                        $("#about_customer").css('display','none');
                    }
                },
                error:function(data){
                    document.write(data['responseText']);
                }

            });
      
    });
    
    $("tr").live('click',function(){
        num_row = this.id; 
        $("#"+num_row).css('background-color','#ecfcec');
    });
    
    $(".edit_customer").live('click', function(){
        var id = this.name;
        
        $("tr").css('background-color','inherit');
        
        $.ajax({
            url:'./query/customer.php',
            type:'post',
            dataType:'json',
            data:{uid:id},
            success:function(data){
                $("#about_customer").css('display','block');
                $("#cu_surname").val(data['customer']['surname']);
                $("#cu_name").val(data['customer']['name']);
                $("#cu_patronymic").val(data['customer']['patronymic']);
                $("#cu_email").val(data['customer']['e_mail']);
                $("#cu_phone").val(data['customer']['phone']);
                $("#cu_shipping").val(data['customer']['shipping_address']);
                $("#cu_desire").val(data['customer']['desire']);
                $("#cuid").val(data['customer']['id']);
            },
            error:function(data){
                document.write(data['responseText']);
            }
        });
    });

    
    function buildCustomersList(customers){
        $("#cust_list").css('display','block');
        
        $.each(customers, function(){
            $("#c_list > tbody").append('<tr id="r_'+this['id']+'"><td class="dat">'+this['id']+'</td><td class="dat">'+this['surname']+' '+this['name']+' '+this['patronymic']+' '+'</td><td class="dat">'+this['e_mail']+'</td><td class="dat">'+this['phone']+'</td><td class="dat">'+this['shipping_address']+'</td><td class="dat">'+this['desire']+'</td><td class="dat"><a class="edit_customer" name="'+this['id']+'">Редакт.</a></td><td class="dat"><a class="delete_customer" name="'+this['id']+'">Удалить.</a></td><td class="dat"><a class="get_pwd" name="'+this['id']+'">Пароль.</a></td></tr>');
            
        });
    }
});

