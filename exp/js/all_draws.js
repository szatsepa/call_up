/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    
        var uid = $("#uid").val();
     
        var pid = $("#pid").val();
        
        var page = 0;
        
        var a_row,  str_cell;
        
        var a_cell = 3;
        
        var ticket = {};
        
        var draws = new Array();

        $.ajax({
            url:'./query/read_draws.php', 
            type:'post',
            dataType:'json',
            success:function(data){
                draws = data['draws'];
//                console.log(draws);
                buildDraws(0);
            },
            error:function(data){
                console.log(data['responseText']);
            }
            
        });
//      $("div").css('outline','1px solid grey');
      
       $(".see_tickets").live('click',function(){
           var dt = this.id;
           var out = {uid:uid,dt:dt};
           $.ajax({
               url:'./query/see_tickets.php',
               type:'post',
               dataType:'json',
               data:out,
               success:function(data){
                   var str = '';
                   $.each(data['tickets'], function(){
                      str += "<a class='see_one' name='"+this['id']+"' id='"+this['c_number']+"'>"+this['c_number']+"</a><br/>";
                   });
                   str_cell = $("#table_draws tbody tr:eq("+a_row+") td:eq("+a_cell+")").html();
                   $("#table_draws tbody tr:eq("+a_row+") td:eq("+a_cell+")").html(str);
               },
               error:function(data){
                   console.log(data['responseText']);
               }
           });
       });
       
       $(".see_one").live('click',function(){
           ticket['id']=this.name;
           ticket['num']=this.id;
           var out = {tid:this.name};
           $.ajax({
              url:'./query/my_ticket.php',
              type:'post',
              dataType:'json',
              data:out,
              success:function(data){
                  var str = "A - "+data['A']+"<br/>B - "+data['B']+"<br/>C - "+data['C']+"<br/><p align='center'><a id='back_t'>Вернутся</a></p>";
                  $("#table_draws tbody tr:eq("+a_row+") td:eq("+a_cell+")").html(str).css('text-align','left').css('width','30%');
                  $("#table_draws tbody tr:eq("+a_row+") td:eq("+(a_cell-1)+")").css('width','45%');
          },
              error:function(data){
                  console.log(data['responseText']);
              }
           });
       });
       
       $("#back_t").live('click',function(){
           $("#table_draws tbody tr:eq("+a_row+") td:eq("+a_cell+")").html(str_cell).css({'text-align':'center','width':'25%'});
           $("#table_draws tbody tr:eq("+a_row+") td:eq("+(a_cell-1)+")").css('width','50%');
       });
       
       $("#table_draws > tbody > tr").live('click',function(){
           a_row = (this.rowIndex-1);
       });
       
//       $("#table_draws > tbody > tr > td").live('click',function(){
//           a_cell = this.cellIndex;
//       });
        
       $(".a_pager").live('click',function(){ 
            var id=this.id;
            page = $("#"+id).text();
            page = Number(page)-1;
            buildDraws((page));
        });
        
    function buildDraws(page){   
        
        $("#table_draws > tbody").empty();
        
        var rows = 36;
        var pos = rows*page;
        pager(rows);
        
        for(var j = pos;j<(pos+rows);j++){
                          
                if(draws[j]==undefined){ 
                    return; 
                }
                $("#table_draws > tbody").append('<tr align="center"><td width="5%">'+(j+1)+'</td><td width="20%">'+draws[j]['date_draw']+'</td><td width="50%"><a class="v_link" href="'+draws[j]['video_link']+'" target="_block">'+draws[j]['video_link']+'</a></td><td width="25%"><a class="see_tickets" id="'+draws[j]['date_draw']+'">Показать</a></td></tr>');
                                    
                } 
    }
    
    function pager(rows){
        
        $("#p_pager, #p_page").empty();  
        
         var len = draws.length;
        
        var pages = Math.ceil(len/rows);
        
        if(draws.length > rows){
                    for(var i = 0;i<(pages);i++){
                        $("#p_pager").append('<a class="a_pager" id="p_'+(i+1)+'">&nbsp;'+(i+1)+'&nbsp;</a>');
                    }
                    $("#p_page").append('<a style="color: black">&nbsp;&nbsp;&nbsp;Страница&nbsp;'+(page+1)+'</a>');
                }
    }

});

