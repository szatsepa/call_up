<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="d_wrapper">
    <div id="paragraff">
        <p>"Tтипа контора"</p>
    </div>
    <div class="left_block">
        <input type="hidden" id="uid" value="<?php echo $_SESSION[id];?>"/>
        <input id="d_nick_name" type="text" value="" required placeholder="Введите логин"/>
        <br/>
        <br/>
        <input id="d_pas" type="password" value="" required placeholder="Ваш пароль"/><span id="vpsw">&nbsp;</span>
        <br/>
        <br/>
        <input id="d_pas_sec" type="password" value="" required placeholder="Ваш пароль еще раз"/><span id="svpsw">&nbsp;</span>
        <br/>
        <br/>
        <p style="text-align: right;"><input id="d_in" type="button" value="Изменить"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
    </div>
    <div class="right_block">
        <input id="d_name" type="text" value="" size="48" required placeholder="Введите имя"/>
        <br/>
        <br/>
        <input id="d_patronimyc" type="text" value="" size="48" required placeholder="Введите отчество"/>
        <br/>
        <br/>
        <input id="d_surname" type="text" value="" size="48" required placeholder="Введите фамилию"/>
        <br/>
        <br/>
        <input id="d_doc" type="text" value="" size="48" required placeholder="Вид документа"/>
        <br/>
        <br/>
        <input id="d_series" type="text" value="" size="48" required placeholder="Серия документа"/>
        <br/>
        <br/>
        <input id="d_num" type="text" value="" size="48" required placeholder="Номер документа"/>
        <br/>
        <br/>
        <input id="d_date" type="text" value="" size="48" required placeholder="Когда выдан"/>
        <br/>
        <br/>
        <input id="d_agency" type="text" value="" size="48" required placeholder="Кем выдан"/>
        <br/>
        <br/>
        <input id="d_addr" type="text" value="" size="48" required placeholder="Адрес регистрации"/>
        <br/>
        <br/>
        <p style="text-align: right;"><input id="d_save" type="button" value="Сохранить"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
        <br/>
        <br/>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#d_in").mousedown(function(){
            
        });
        $("#d_ssave").mousedown(function(){
            
        });
        $("#d_pas").change(function(){
            var psw = $("#d_pas").val();
            var str = '*';
            
            $("#vpsw").css('visibility', 'visible');
            console.log(psw.length); 
//            $.each(psw, function(){
//                str += " ";
//            });
//            $("#d_pas").val(str);
        });
        function _save(url, out){
            
        }
        function _pswValidation(psw,psw1){
            
        }
        function checkMail(value){
            var pattern = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return ret = (pattern.test(value)) ? (1) : (0);
        }
    });
</script>