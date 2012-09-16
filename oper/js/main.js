/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    
    var uid = $("#uid").val();
    
    var num_row = 0;
    
    $("#customer").mousedown(function(){
        $.ajax({
            url:'query/customerslist.php',
            type:'post',
            dataType:'json',
            data:{uid:uid},
            success:function(data){
                buildCustomersList(data['list']);
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
                        $("#r_"+data['customer']['uid']).remove();
                        $("#c_list > tbody").append('<tr id="r_'+data['customer']['uid']+'"><td class="dat">'+data['customer']['uid']+'</td><td class="dat">'+data['customer']['surname']+' '+data['customer']['name']+' '+data['customer']['patronymic']+' '+'</td><td class="dat">'+data['customer']['email']+'</td><td class="dat">'+data['customer']['phone']+'</td><td class="dat">'+data['customer']['shipping']+'</td><td class="dat">'+data['customer']['desire']+'</td><td class="dat"><a class="edit_customer" name="'+data['customer']['uid']+'">Редакт.</a></td><td class="dat"><a class="delete_customer" name="'+data['customer']['uid']+'">Удалить.</a></td><td class="dat"><a class="get_pwd" name="'+data['customer']['uid']+'">Пароль.</a></td></tr>');
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
    $(".delete_customer").live('click', function(){
        var id = this.name;
        console.log(id);
    });
    $(".get_pwd").live('click', function(){
        var id = this.name;
        console.log(id);
    });
    
    function buildCustomersList(customers){
        $("#cust_list").css('display','block');
        $("#c_list > body").empty();
        
        $.each(customers, function(){
            $("#c_list > tbody").append('<tr id="r_'+this['id']+'"><td class="dat">'+this['id']+'</td><td class="dat">'+this['surname']+' '+this['name']+' '+this['patronymic']+' '+'</td><td class="dat">'+this['e_mail']+'</td><td class="dat">'+this['phone']+'</td><td class="dat">'+this['shipping_address']+'</td><td class="dat">'+this['desire']+'</td><td class="dat"><a class="edit_customer" name="'+this['id']+'">Редакт.</a></td><td class="dat"><a class="delete_customer" name="'+this['id']+'">Удалить.</a></td><td class="dat"><a class="get_pwd" name="'+this['id']+'">Пароль.</a></td></tr>');
            
        });
    }
});

