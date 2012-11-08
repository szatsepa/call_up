<?php
if(isset($_SESSION[auth]) && $_SESSION[auth]=='yes'){
        header("location:index.php?act=main");
    }
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<body>
    <div id="d_wrapper">
        <?php 
        include 'login.php';
        ?>
    </div>
</body>
<script type="text/javascript">
    $(document).ready(function(){
//        $("div").css('outline', '1px solid grey');

        $("#d_nick_name").focus();
        
        $("#d_password").keypress(function(e){ 
            var out = {login:$("#d_nick_name").val(), password:$("#d_password").val()};
            if(e.which == 13){
                 if(!$("#d_password").val()){
                        alert("Поле пароль пустое!");
                    }else{
                        logIn(out);
                    }
            }
        });
        
        $("#d_in").mousedown(function(){
            
                    var out = {login:$("#d_nick_name").val(), password:$("#d_password").val()};
                    
                    if(!$("#d_nick_name").val() || !$("#d_password").val()){
                        alert("Одно или оба поля пустые!");
                    }else{
                        logIn(out);
                    }
                    
                    

        });
        function logIn(out){
            $.ajax({
                        url:'query/autentication.php',
                        type:'post',
                        dataType:'json',
                        data:out,
                        success:function(data){
//                            console.log(data['uid']);
                            if(data['uid']){
                               alert("VASHOL!!!");
                               document.location.href = "index.php?act=main";
                            }else{
                               alert("NE VASHOL!!!"); 
                            }
                        },
                        error:function(data){
                            console.log(data['responseText']);
                        }
                    });
                    return false;
            }
    });
</script>