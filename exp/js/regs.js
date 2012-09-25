/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    
//    $("div").css('outline','1px solid grey');
    $("#save_me").mousedown(function(){
        var name = $("#name").val();
        var surname = $("#surname").val();
        var patronymic = $("#patronymic").val();
        var phone = $("#phone").val();
        var email = $("#email").val();
	var reg = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
        var out = {name:name,surname:surname,patronymic:patronymic,phone:phone,email:email};
//        console.log(out);
        if (!email.match(reg)) {
            alert("Пожалуйста, проверте правильно ли введен адрес.");
            $("#email").val('');
            return false;
        }else{
            $.ajax({
                url:'./action/registration.php',
                type:'post',
                dataType:'json',
                data:out,
                success:function(data){
                    if(data['ok']==1){
                        alert("Вы успешно зарегистрировались на call-up.ru!\nВ Вашу почту("+data['mail']+") придет ключ доступа\nЕсли Вы не видите письма проверте папкку 'СПАМ'");
                        
                    }else if(data['ip']==1){
                        alert("По вашему IP-адресу уже зарегистрирован пользователь!\nЕсли Вы забыли код доступа напишите письмо администратору.");
                        
                    }
                    document.location.href="index.php?act=look";
                },
                error:function(data){
                    document.write(data['responseText']);
                }
            });
        }

    });
});

