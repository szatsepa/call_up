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
    <div id="d_main_menu">
        <table id="m_menu">
            <thead></thead>
            <tbody>
                <tr>
                    <td><a class="menu_btn" id="b_1">First</a></td>
                    <td><a class="menu_btn" id="b_2">Второй</a></td>
                    <td><a class="menu_btn" id="b_3">Третий</a></td>
                    <td><a class="menu_btn" id="b_4">Шитвертый</a></td>
                    <td><a class="menu_btn" id="b_5">Пьятий</a></td>
                    <td><a class="menu_btn" id="b_6">Шистой</a></td>
                    <td><a class="menu_btn" id="b_7">Сидьмой</a></td>
                    <td><a class="menu_btn" id="b_8">Васьмой</a></td>
                    <td><a class="menu_btn" id="b_9">Дивятий</a></td>
                    <td><a class="menu_btn" id="b_10">Дисятий</a></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div id="submenu">
      <ul id="s_m">
<!--        <li class="ll" id="l1">Sub_one</li>
        <li class="ll" id="l2">Sub_two</li>
        <li class="ll" id="l3">Sub_tree</li>-->
      </ul>
    </div>
    
</div>
<script type="text/javascript">
    $(document).ready(function(){
        
        var first_submenu = ['first'];
        var first_mine_menu = {first:{'0':"privat",'1':'whot','2':'where'}};
        
        $(".menu_btn").mousedown(function(){
            var id = this.id;
            var num = id.substr(2)-1;
            var aga = first_submenu[num];
            var pos = $("#"+id).position();
            var set = $("#"+id).offset();
            var str = $("#"+id).text();
            var num = 0;
            if(first_mine_menu[aga]){
                $.each(first_mine_menu[aga], function(){
                    $("#s_m").append('<li class="ll" id="'+this+'">'+this+'</li>'); 
                    num++;
                });  
            }
            $("#l0").remove();
            $("#s_m").prepend('<li id="l0">'+str+"</li>");
            $("#submenu").css({'display':'block','left':(pos['left']-13)});
            $("#s_m").attr('name', num);
            
        });
        $(".ll").live('mousedown',function(){
            var id = this.id;
            var str = $("#"+id).text(); 
            alert('Ідітє в гм... па адріссу "'+str+'"');
            document.location = 'index.php?act='+id;
        });
    });
</script>