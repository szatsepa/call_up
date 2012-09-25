<div class="outside">
<div id= "wrapper">
      <div class="selector">
<?php


if (!isset ($_SESSION[user])) {

    ?>
    
<!--          <div class="selector23">
              <p> Поиск:</p>
             <form  action="index.php?act=look" method="post">   
                 Поиск :
                <input type="hidden" name="search" value="S"/>
                <input type="hidden" name="select" value="default"/>
                <input style="font: 10px Arial;color: #0000FF;" type="text" required  name="str" value="<?php echo $attributes[str];?>"/>
                <input type="submit" value="&gt;&gt;" style='color:green;font-size: 8px'/>
           </form> 
          </div>-->
<?php }
    if(isset ($_SESSION[user])){ 
//        $user = $_SESSION[user]->data;  
//    ?>
<div class="selector13">
    <table class="selector" border="0" width="100%">
           <tbody>
                <tr>
                    <td align="left">
                        <form action='index.php?act=logout'  method='post'>
                            <input type="text" name="customer" value="<?php echo $_SESSION[user]->data[name]." ". $_SESSION[user]->data[surname];?>" disabled />      
                            <input type='submit' class='submit3' value='X' style='color:red'/>
                        </form>
                        
                    </td>
                    <td  align="right">
                        <form action="index.php?act=private_office" method="post">
                         <input type="submit"  value="Личный кабинет" class="submit2"/> 
                     </form>
<!--                        оставим пока кнопочку без дела но надо будет приаттачить-->
                        
                    </td>
                    <td  align="left">
                        
                         <input id="check_group" type="button"  value="/ Отметить группу" class="submit2"/>
                    
                    </td> 
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

                </tr>
            </tbody>
        </table>
</div>    


<?php

// To Do Если имя и фамилия очень длинные, то выводить только фамилию
    }else{
?>

 <div class="selector13">
    <table class="selector" border="0" width="480">  
        <tbody>
            <tr>
                <td width="200">
                    <form action="index.php?act=authentication" method="post">
                        Ключ:
                        <input id="pwd" type="password" required name="code" size="14" value="" style='font-size:8pt;'/>
                        <input type="hidden" name="stid" value="2"  />
                        <input id="log_in" type="submit" value="&gt;&gt;" class='submit3' style='color:green' />
                    </form>    
                    
                </td>
               <td align="center" width="240">
                    <input id="go_reg" type='button' class='submit2' value='Зарегистрироватся'/>                       
               </td>
            </tr>
        </tbody>         
    </table>
 </div>
          
<?php    }?>
</div>

