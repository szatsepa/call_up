function validatePwd()
{
var pw1 = document.getElementById("psw").value;
var pw2 = document.getElementById("psw_1").value;


if (pw1 != pw2)
{
alert ("Пароли не совпадают. Заполните форму еще раз.");
return false;
}
else
{
return true;
}
}
function isEmailCorrect() { 

        var ml = document.getElementById("eml").value;
	var reg = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
        if (!ml.match(reg)) {alert("Пожалуйста, проверте правильно ли введен адрес.");
        document.getElementById('eml').value="";return false;}
}
function errAuth(){
    
    alert("Пожалуйста, введите правильно ключ или будьте гостем!.");
}

function sortingIN(){ 

    document.form.select.style.display='';

}
function sortingOUT(){

   var str = document.form.select.value;
   
   location.replace("http://shop.animals-food.ru/storefront/index.php?act=look&select="+str);

}
function unvisibleSort(){
    
    var id = setTimeout(function(){ document.form.select.style.display = 'none';}, 3000);
    

}